<?php


namespace Application\Controller;


use Application\Model\Article\ArticleDb;
use Application\Model\Auteur\AuteurDb;
use Application\Model\Categorie\CategorieDb;
use Application\Model\Tags\TagsDb;
use Core\Controller\AppController;
use Core\Model\DbFactory;
use Core\Model\ORM;

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
        #DbFactory::IdiormFactory();
        $idarticle      = $_GET['idarticle'];
        $article        = ORM::for_table('view_articles')->find_one($idarticle);
        $tags           = ORM::for_table('tags')->where('IDTAGS', $idarticle)->find_result_set();
        $suggestions    = ORM::for_table('view_articles')->where('IDCATEGORIE', $article->IDCATEGORIE)->limit(3)->find_result_set();
        $auteur         = ORM::for_table('auteur')->where('IDAUTEUR',$article->IDAUTEUR)->find_one();
        $this->render('news/article', ['article' => $article, 'tags' => $tags, 'suggestions' => $suggestions,'auteur'=>$auteur]);
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
    public function idiormAction(){
        DbFactory::IdiormFactory();
        $auteurs=ORM::for_table('auteur')->
        find_result_set();
           # find_array();
        #$this->renderJson($categories);
        echo "<table border='1'>";
        foreach ($auteurs as $auteur):
            echo "<tr><td>".$auteur->NOMAUTEUR.'</td>'.'<td>'.$auteur->PRENOMAUTEUR.'</td>'.'</tr>';
        endforeach;
        echo "</table>";
    }


}