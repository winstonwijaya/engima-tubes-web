<?php

namespace App\Core;

use App\Utilities\Redirect;

/**
 * Class BaseController
 * @package App\Core
 */
class BaseController
{
    protected $view = null;
    protected $model = null;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->view = new BaseView();
    }

    /**
     * @param $model
     * @return mixed
     */
    public function useModel($model)
    {
        require_once '../app/Models/' . $model . '.php';
        $classModel = 'App\Models\\' . $model;
        return new $classModel;
    }

    /**
     * @return mixed
     */
    public function getUserIDFromCookies()
    {
        if (!isset($_COOKIE[COOKIE_USER]))
        {
            Redirect::to( 'login');
            die();
        }
        $userID = $this->useModel('User')->getUserIDFromCookies($_COOKIE[COOKIE_USER]);
        if (isset($userID) && $userID > 0)
        {
            return $userID;
        }
        Redirect::to('login');
        die();
    }
}
