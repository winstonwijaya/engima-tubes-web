<?php


namespace App\Controllers;


use App\Core\BaseController;
use App\Utilities\Redirect;

/**
 * Class Register
 * @package App\Controllers
 */
class Register extends BaseController
{
    /**
     *
     */
    public function index()
    {
        // Step 1: Provide necessary data
        $this->view->data['pageTitle'] = 'Register';

        // Step 2: Render
        $this->view->addJS('js/index.js');
        $this->view->addCSS('css/register.css');
        $this->view->addJS('js/register.js');
        $this->view->render('templates/header');
        $this->view->render('register/index');
        $this->view->render('templates/footer');
    }

    /**
     *
     */
    public function proceed()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $profilePic = $_FILES['profilePic'];
        $this->useModel('Register')->insertNewUser($username, $email, $phone, $password, $profilePic);
        Redirect::to('home');
    }

    /**
     * @param $username
     */
    public function checkusername($username)
    {
        $exists = $this->useModel('Register')->isUsernameExists($username);
        http_response_code($exists ? 400 : 200);
    }

    /**
     * @param $email
     */
    public function isEmailExists($email)
    {
        $exists = $this->useModel('Register')->isEmailExists($email);
        http_response_code($exists ? 400 : 200);
    }

    /**
     * @param $phone
     */
    public function isPhoneExists($phone)
    {
        $exists = $this->useModel('Register')->isEmailExists($phone);
        http_response_code($exists ? 400 : 200);
    }
}