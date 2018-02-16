<?php

namespace Core\Controller;


use Core\Model\DbFactory;

class AppController
{
    private $_viewparams;

    public function __construct()
    {
        DbFactory::IdiormFactory();
    }

    protected function render($view,array $viewparams=[]){
        $this->_viewparams=$viewparams;
        extract($this->_viewparams);

        $view= PATH_VIEWS."/".$view.".php";
        if(file_exists($view)) :
            include_once PATH_HEADER;
            include_once $view;
            include_once PATH_FOOTER;

            else :
            $this->render('errors/404',['message'=>'Aucune vue correspondante']);
        endif;
    }

    protected function renderJson(Array $params){
        header('Content-Type:application\json');
        echo json_encode($params);
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
    public function debug($params =''){
        if(empty($params)):
            $params=$this->_viewparams;
        endif;
        echo "<pre>";
            print_r($params);
        echo "</pre>";
    }
    public function getAction(){
        return empty($_GET['action']) ? 'accueil' : $_GET['action'];
    }


}