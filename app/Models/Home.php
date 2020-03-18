<?php


namespace App\Models;


use App\Core\BaseModel;

class Home extends BaseModel
{
    public function getAllMovies()
    {
        $dbResult = $this->db->execute(
            "SELECT m.id, title, poster, rating 
                         FROM movies m JOIN schedules s on m.id = s.movie_id
                         WHERE s.date_time >= NOW()
                         GROUP BY m.id");
        $dbResult = $dbResult->getQueryResult();

        foreach ($dbResult as $row)
        {
            if (!$row->rating)
            {
                $row->rating = 'no rating';
            }
        }
        return  $dbResult;
    }
}