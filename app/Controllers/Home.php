<?php

namespace App\Controllers;

use App\Core\BaseController;


/**
 * Class Home
 * @package App\Controllers
 */
class Home extends BaseController
{
    /**
     *
     */
    public function index()
    {
        $userID = $this->getUserIDFromCookies();
        $this->view->data['username'] = $this->useModel('User')->getUsernameByUserID($userID);

        $this->view->data['pageTitle'] = 'Home';
        $this->view->data['movies'] = $this->useModel('Home')->getAllMovies();

        $this->view->addCSS('css/navbar.css');
        $this->view->addCSS('css/home.css');
        $this->view->render('templates/header');
        $this->view->render('templates/navbar');
        $this->view->render('home/index');
        $this->view->render('templates/footer');
    }
}
