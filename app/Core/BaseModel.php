<?php


namespace App\Core;


use App\Utilities\Database;

/**
 * Class BaseModel
 * @package App\Core
 */
class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
}