<?php


namespace App\Controllers;


use App\Core\BaseController;
use App\Utilities\Redirect;

/**
 * Class Booking
 * @package App\Controllers
 */
class Booking extends BaseController
{
    /**
     * @param $scheduleID
     */
    public function index($scheduleID)
    {
        // Step 1: Check If logged in
        $userID = $this->getUserIDFromCookies();

        // Step 2: Set data to view
        $this->view->data['pageTitle'] = 'Booking';
        $this->view->data['userID'] = $userID;
        $this->view->data['scheduleID'] = $scheduleID;
        $this->view->data['seats'] = $this->useModel('Booking')->getAvailableSeatsByScheduleID($scheduleID);
        $this->view->data['bookInfo'] = $this->useModel('Booking')->getScheduleInfoByID($scheduleID);

        // Step 3: Render
        $this->view->addCSS('css/navbar-backup.css');
        $this->view->addCSS('css/booking.css');
        $this->view->addJS('js/index.js');
        $this->view->addJS('js/booking.js');
        $this->view->render('templates/header');
        $this->view->render('templates/navbar');
        $this->view->render('booking/index');
        $this->view->render('templates/footer');
    }

    public function book($scheduleID, $seatNumber)
    {
        $userID = $this->getUserIDFromCookies();
        $this->useModel('Booking')->bookSeat($userID, $scheduleID, $seatNumber);
    }
}