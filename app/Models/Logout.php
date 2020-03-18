<?php


namespace App\Models;


use App\Core\BaseModel;

/**
 * Class Logout
 * @package App\Models
 */
class Logout extends BaseModel
{
    /**
     * @param $cookie_string
     */
    public function deleteCookie($cookie_string)
    {
        $this->db->execute(
            "DELETE FROM cookie WHERE cookie_string = :cookieString",
            ['cookieString' => $cookie_string]
        );
    }
}