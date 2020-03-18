<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Utilities\Redirect;

/**
 * Class Login
 * @package App\Controllers
 */
class Login extends BaseController
{
    /**
     *
     */
    public function index()
    {
        if (isset($_COOKIE[COOKIE_USER]))
        {
            Redirect::to('home/index');
            die();
        }
        // Step 1: Add data
        $this->view->data['pageTitle'] = 'Login';

        // Step 2: Render
        $this->view->addCSS('css/login.css');
        $this->view->addJS('js/index.js');
        $this->view->render('templates/header');
        $this->view->render('login/index');
        $this->view->render('templates/footer');
    }

    /**
     *
     */
    public function proceed()
    {
        // Step 1: Get data from POST
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Step 2: Check in Database
        $user = $this->useModel('Login')->loginGetUser($email, $password);
        if ($user)
        {
            $username = $user->username;
            $hashedUsername  = password_hash($username, PASSWORD_BCRYPT);

            $userID = $user->id;
            setcookie(COOKIE_USER, $hashedUsername, COOKIE_EXPIRE, '/');
            $this->useModel('Login')->insertNewCookies($hashedUsername, $userID);
            Redirect::to('home/index');
        }
        else
        {
            Redirect::to( 'login/index');
        }
    }
}