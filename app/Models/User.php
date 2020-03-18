<?php


namespace App\Models;


use App\Core\BaseModel;

/**
 * Class User
 * Used in page: login, register
 * @package App\Models
 */
class User extends BaseModel
{
    /**
     * @param $cookie_string
     * @return mixed
     */
    public function getUserIDFromCookies($cookie_string){
        $dbResult = $this->db->execute(
            "SELECT userid 
                         FROM cookie 
                         WHERE cookie_string = :cookie_string",
            ['cookie_string' => $cookie_string]
        );
        return $dbResult->getQueryResult()[0]->userid;
    }

    /**
     * @param $userID
     * @return mixed
     */
    public function getUserNameByUserID($userID)
    {
        $dbResult = $this->db->execute(
            "SELECT username
                         FROM users
                         WHERE id = :userid",
            ['userid' => $userID]
        );
        return $dbResult->getQueryResult()[0]->username;
    }
}