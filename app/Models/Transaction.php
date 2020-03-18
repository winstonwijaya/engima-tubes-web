<?php


namespace App\Models;


use App\Core\BaseModel;

/**
 * Class Transaction
 * @package App\Models
 */
class Transaction extends BaseModel
{
    public function getTransactionHistory($userID)
    {
        $result = $this->db->execute(
            "SELECT t.id, s.movie_id, m.title, m.poster, s.date_time 
                         FROM transactions t JOIN schedules s ON t.schedule_id = s.id
                                JOIN movies m on s.movie_id = m.id
                         WHERE user_id = :userID",
            ['userID' => $userID]
        );
        $result =  $result->getQueryResult();
        foreach ($result as $row)
        {
            $row->is_can_review = (date('Y-m-d H:i:s') > $row->date_time);
            $row->is_review_exists = $this->isReviewExists($row->id);
        }
        return $result;
    }

    private function isReviewExists($transactionID)
    {
        $result = $this->db->execute(
            "SELECT reviews.transaction_id FROM reviews WHERE transaction_id = :transactionID",
            ['transactionID' => $transactionID]
        );
        return ($result->getQueryResultCount() > 0);
    }

    public function deleteReview($transactionID)
    {
        $this->db->execute(
            "DELETE FROM reviews WHERE transaction_id = :transactionID",
            ['transactionID' => $transactionID]
        );
    }
}