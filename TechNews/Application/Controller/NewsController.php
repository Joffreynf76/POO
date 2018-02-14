<?php


namespace Application\Controller;


use Application\Model\Article\ArticleDb;
use Application\Model\Auteur\AuteurDb;
use Application\Model\Categorie\CategorieDb;
use Application\Model\Tags\TagsDb;
use Core\Controller\AppController;

class NewsController extends AppController
{
    public function indexAction(){

        $this->render('news/index',['titre'=> 'Accueil']);
        #include_once PATH_VIEWS. '/news/index.php';
    }
    public function categorieAction(){
        $categorieDb= new CategorieDb();
        $categories = $categorieDb->fetchAll();
        $this->render('news/categorie',['categories'=>$categories]);
    }
    public function articleAction(){
        $articleDb= new ArticleDb();
        $articles = $articleDb->fetchAll();
        $this->render('news/article',['article'=>$articles]);
    }
    public function auteurAction(){
        $auteurDb = new AuteurDb();
        $auteurs = $auteurDb->fetchAll();
        $this->render('news/auteur',['auteur'=>$auteurs]);
    }
    public function tagsAction(){
        $tagDb = new TagsDb();
        $tags = $tagDb->fetchAll();
        $this->render('news/tags',['tags'=>$tags]);
    }
}