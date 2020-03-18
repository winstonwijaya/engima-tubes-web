<?php


namespace App\Models;


use App\Core\BaseModel;

/**
 * Class Booking
 * @package App\Models
 */
class Booking extends BaseModel
{
    /**
     * @param $scheduleID
     * @return array
     */
    public function getAvailableSeatsByScheduleID($scheduleID)
    {
        $dbResult = $this->db->execute(
            "SELECT seat_number
                        FROM seats
                        WHERE schedule_id = $scheduleID");
        $dbResult = $dbResult->getQueryResult();

        $seatConditions = array_fill(1, 30, false);
        foreach ($dbResult as $row)
        {
            $seatConditions[$row->seat_number] = true;
        }
        return $seatConditions;
    }

    /**
     * @param $scheduleID
     * @return mixed
     * @throws \Exception
     */
    public function getScheduleInfoByID($scheduleID){
        $dbResultScheduleInfo = $this->db->execute(
          "SELECT * FROM schedules WHERE id= :scheduleID",
            ['scheduleID' => $scheduleID]
        );
        $dbResultScheduleInfo = $dbResultScheduleInfo->getQueryResult();

        $movieID = $dbResultScheduleInfo[0]->movie_id;
        $dbResultMovieTitle = $this->db->execute(
          "SELECT title FROM movies WHERE id= :movieID",
            ['movieID' => $movieID]
        );
        $dbResultMovieTitle = $dbResultMovieTitle->getQueryResult();


        $dt = new \DateTime($dbResultScheduleInfo[0]->date_time);

        $scheduleInfo['date'] = $dt->format('F j, Y');
        $scheduleInfo['time'] = $dt->format('h:i A');
        $scheduleInfo['available_seats'] = $dbResultScheduleInfo[0]->available_seats;
        $scheduleInfo['is_available'] = ($scheduleInfo['available_seats'] > 0);
        $scheduleInfo['movie_title'] = $dbResultMovieTitle[0]->title;
        $scheduleInfo['movie_id'] = $movieID;

        return $scheduleInfo;
    }

    /**
     * @param $userID
     * @param $scheduleID
     * @param $seatNumber
     */
    public function bookSeat($userID, $scheduleID, $seatNumber)
    {
        // Step 1: Reduce table schedule
        $this->db->execute(
            "UPDATE schedules 
                         SET available_seats=available_seats-1
                         WHERE id=:scheduleID",
            ['scheduleID' => $scheduleID]
        );

        // Step 2: Add table seats
        $this->db->execute(
            "INSERT INTO seats (schedule_id, seat_number) 
                         VALUES (:scheduleID, :seatNumber)",
            [':scheduleID' => $scheduleID, ':seatNumber' => $seatNumber]
        );

        // Step 3: Add transaction
        $this->db->execute(
          "INSERT INTO transactions (schedule_id, user_id, price) 
                       VALUES (:scheduleID, :userID, 45000)",
            ['scheduleID' => $scheduleID, 'userID' => $userID]
        );
    }
}