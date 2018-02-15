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
        $articleDb = new ArticleDb();
        $articles = $articleDb->fetchAll();
        $spotlight = $articleDb->fetchAll('SPOTLIGHTARTICLE = 1');

        $this->render('news/index',['articles'=>$articles,'spotlight'=>$spotlight]);
        #include_once PATH_VIEWS. '/news/index.php';
    }
    public function categorieAction(){
        $categorieDb= new CategorieDb();
        $categories = $categorieDb->fetchAll();
        $this->render('news/categorie');
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
    public function businessAction(){
        $articleDb= new ArticleDb();
        $article = $articleDb->fetchAll('IDCATEGORIE = 2');
        $this->render('news/categorie',['articles'=>$article]);
    }
    public function computingAction(){
        $articleDb= new ArticleDb();
        $article = $articleDb->fetchAll('IDCATEGORIE = 3');
        $this->render('news/categorie',['articles'=>$article]);
    }
    public function techAction(){
        $articleDb= new ArticleDb();
        $article = $articleDb->fetchAll('IDCATEGORIE = 4');
        $this->render('news/categorie',['articles'=>$article]);
    }


}