<?php


namespace Application\Controller;


use Core\Controller\AppController;

class NewsController extends AppController
{
    public function indexAction(){
        $this->render('news/index',['titre'=> 'Webforce 3 Rouen !']);
        #include_once PATH_VIEWS. '/news/index.php';
    }
    public function categorieAction(){
        $this->render('news/categorie',['titre3'=>'Page categorie']);
    }
    public function articleAction(){
        $this->render('news/article',['titre2'=>'Page article']);
    }
}