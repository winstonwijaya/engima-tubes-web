<?php


namespace App\Controllers;


use App\Core\BaseController;
use App\Utilities\Redirect;

/**
 * Class Review
 * @package App\Controllers
 */
class Review extends BaseController
{
    /**
     * @param $transactionID
     */
    public function index($transactionID)
    {
        $this->getUserIDFromCookies();
        $this->view->data['pageTitle'] = 'Review';

        $this->view->data['transactionID'] = $transactionID;
        $this->view->data['movie'] = $this->useModel('Review')->getMovieFromTransaction($transactionID);

        $this->view->addCSS('css/review.css');
        $this->view->addCSS('css/navbar.css');
        $this->view->render('templates/header');
        $this->view->render('review/index');
        $this->view->render('templates/footer');
    }

    public function insertNewComment($transactionID, $movieID)
    {
        $rating = (isset($_POST['rating']) ? $_POST['rating'] : 0);
        $comment = $_POST['comment'];

        $this->useModel('Review')->insertNewComment($transactionID, $movieID, $rating, $comment);
        Redirect::to('transaction');
    }
}