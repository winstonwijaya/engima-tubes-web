<?php


namespace App\Core;


/**
 * Class BaseView
 * @package App\Core
 */
class BaseView
{
    public $data = [];
    private $includeCSS = '';
    private $includeJS = '';


    public function getIncludeCSS(): string
    {
        return $this->includeCSS;
    }

    public function getIncludeJS(): string
    {
        return $this->includeJS;
    }

    public function addCSS($files)
    {
        $files = (array) $files;
        foreach ($files as $file)
        {
            $this->includeCSS .= '<link type="text/css" rel="stylesheet" href="' . URL_BASE_PUBLIC . $file . '" />' . "\n";
        }
    }


    public function addJS($files)
    {
        $files = (array) $files;
        foreach ($files as $file)
        {
            $this->includeJS .= '<script type="text/javascript" src="' . URL_BASE_PUBLIC . $file . '"></script>' . "\n";
        }
    }

    public function render($filePath)
    {
        if (file_exists('../app/Views/' . $filePath . '.php'))
        {
            require_once '../app/Views/' . $filePath . '.php';
        }
    }
}