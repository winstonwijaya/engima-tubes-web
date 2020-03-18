<?php


namespace App\Controllers;


use App\Core\BaseController;
use App\Utilities\Redirect;

/**
 * Class Logout
 * @package App\Controllers
 */
class Logout extends BaseController
{
    /**
     *
     */
    public function index()
    {
        if (!isset($_COOKIE[COOKIE_USER]))
        {
            Redirect::to( 'login');
            die();
        }
        $this->useModel('Logout')->deleteCookie($_COOKIE[COOKIE_USER]);
        unset($_COOKIE[COOKIE_USER]);
        setcookie(COOKIE_USER, null, time() - 3600, '/');
        Redirect::to('login');
    }
}