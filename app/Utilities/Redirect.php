<?php


namespace App\Utilities;


/**
 * Class Redirect
 * @package App\Utilities
 */
class Redirect
{
    /**
     * @param string $location
     */
    public static function to($location = '')
    {
        header('Location:' . URL_BASE_PUBLIC . $location);
        die();
    }
}