<?php

namespace Core\Controller;


class AppController
{
    private $_viewparams;

    protected function render($view,array $viewparams=[]){
        $this->_viewparams=$viewparams;
        include_once PATH_HEADER;

        include_once PATH_VIEWS."/".$view.".php";

        include_once PATH_FOOTER;
    }
}