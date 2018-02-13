<?php


namespace Application\Controller;


use Core\Controller\AppController;

class NewsController extends AppController
{
    public function indexAction(){
        $this->render('news/index');
        #include_once PATH_VIEWS. '/news/index.php';
    }
    public function categorieAction(){
        echo "Je suis categorie action";
    }
    public function articleAction(){
        echo "Je suis article action";
    }
}