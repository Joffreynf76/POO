<?php


namespace Application\Controller;


use Application\Model\Categorie\CategorieDb;
use Core\Controller\AppController;

class NewsController extends AppController
{
    public function indexAction(){
        $categorieDb= new CategorieDb();
        $categories = $categorieDb->fetchAll();
        $this->render('news/index',['categories'=> $categories]);
        #include_once PATH_VIEWS. '/news/index.php';
    }
    public function categorieAction(){
        $this->render('news/categorie',['titre3'=>'Page categorie']);
    }
    public function articleAction(){
        $this->render('news/article',['titre2'=>'Page article']);
    }
}