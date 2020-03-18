<?php


namespace App\Controllers;


use App\Core\BaseController;
use App\Utilities\Redirect;

/**
 * Class Transaction
 * @package App\Controllers
 */
class Transaction extends BaseController
{
    /**
     *
     */
    public function index()
    {
        $userID = $this->getUserIDFromCookies();
        
        $this->view->data['pageTitle'] = 'Transaction';
        $this->view->data['transactions'] = $this->useModel('Transaction')->getTransactionHistory($userID);

        $this->view->addCSS('css/navbar.css');
        $this->view->addCSS('css/transaction.css');
        $this->view->render('templates/header');
        $this->view->render('templates/navbar');
        $this->view->render('transaction/index');
        $this->view->render('templates/footer');
    }

    public function deleteReview($transactionID)
    {
        $this->getUserIDFromCookies();
        $this->useModel('Transaction')->deleteReview($transactionID);
        Redirect::to('home/index');
    }
}