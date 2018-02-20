<?php

namespace App\Controller\TechNews;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Article\ArticleProvider;

class IndexController extends Controller
{
    public function index(ArticleProvider $articleProvider) {
        #return new Response("<html><body><h1>PAGE D'ACCUEIL</h1></body></html>");
        #return $this->render('index/index.html.twig');
        $articles = $articleProvider->getArticles();
        return $this->render('index/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @param string $libellecategorie
     * @return Response
     * @Route("/categorie/{libellecategorie}",name="index_categorie",methods={"GET"})
     */
    public function categorie($libellecategorie = '') {
        return new Response("<html><body><h1>PAGE CATEGORIE : $libellecategorie</h1></body></html>");
    }

    /**
     * @param $libellecategorie
     * @param $titrearticle
     * @param $idarticle
     * @return Response
     * @Route("{libellecategorie}/{slugarticle}_{idarticle}.html",name="index_article",requirements={"idarticle"="\d+"},methods={"GET"})
     */
    public function article($libellecategorie,$slugarticle,$idarticle){
        return new Response("<html><body><h1>Page article : $libellecategorie | $slugarticle | $idarticle</h1></body></html>");
    }
}