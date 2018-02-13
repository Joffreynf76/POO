<?php

namespace Core\Controller;


class AppController
{
    private $_viewparams;

    protected function render($view,array $viewparams=[]){
        $this->_viewparams=$viewparams;
        extract($this->_viewparams);
        include_once PATH_HEADER;

        include_once PATH_VIEWS."/".$view.".php";

        include_once PATH_FOOTER;
    }

    /**
     * @return mixed
     */
    public function getViewparams()
    {
        $object = new \ArrayObject($this->_viewparams);
        $object->setFlags(\ArrayObject::ARRAY_AS_PROPS);
        return $object;
    }
}