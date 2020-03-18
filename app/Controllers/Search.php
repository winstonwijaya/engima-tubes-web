<?php


namespace App\Controllers;


use App\Core\BaseController;

/**
 * Class Search
 * @package App\Controllers
 */
class Search extends BaseController
{
    /**
     * @param $pageNumber
     */
    public function index($pageNumber = 1)
    {
        if(isset($_POST['search2'])) {
            $querySearch = $_POST['search2'];
        } else {
            $querySearch = "";
        }

        $this->view->data['pageTitle'] = $querySearch;
        $this->view->data['movies'] = $this->useModel('Search')->searchMovies($querySearch, $pageNumber);
        $this->view->data['totalMovies'] = $this->useModel('Search')->totalMovies($querySearch);
        $this->view->data['currentPage'] = $pageNumber;

        $this->view->addCSS('css/navbar.css');
        $this->view->addCSS('css/search.css');
        $this->view->render('templates/header');
        $this->view->render('templates/navbar');
        $this->view->render('search/index');
        $this->view->render('templates/footer');
    }
}