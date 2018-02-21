<?php

namespace App\Controller\TechNews;


use App\Entity\Article;
use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#use App\Service\Article\ArticleProvider;

class IndexController extends Controller
{
    public function index() {
        #return new Response("<html><body><h1>PAGE D'ACCUEIL</h1></body></html>");
        #return $this->render('index/index.html.twig');
        #$articles = $articleProvider->getArticles();
        $article = $this->getDoctrine()->getRepository(Article::class)->findAll();
        $spotlight=$this->getDoctrine()->getRepository(Article::class)->findSpotlightArticles();
        return $this->render('index/index.html.twig', [
            'articles' => $article,'spotlight'=>$spotlight
        ]);
    }

    /**
     * @param string $libellecategorie
     * @return Response
     * @Route("/categorie/{libellecategorie}",name="index_categorie",methods={"GET"})
     */
    public function categorie(Categorie $article) {
        #return new Response("<html><body><h1>PAGE CATEGORIE : $libellecategorie</h1></body></html>");
        $catarticle= $this->getDoctrine()
        return $this->render('index/categorie.html.twig',['article'=>$catarticle]);

    }

    /**
     * @param $libellecategorie
     * @param $titrearticle
     * @param $idarticle
     * @return Response
     * @Route("{libellecategorie}/{slugarticle}_{id}.html",name="index_article",requirements={"id"="\d+"},methods={"GET"})
     */
    public function article(Article $article){
        #$article = $this->getDoctrine()->getRepository(Article::class)->find($idarticle);
        if(!$article):
            #throw $this->createNotFoundException("Nous n'avons pas trouvé votre article id : ".$idarticle);
        return $this->redirectToRoute('index',[],Response::HTTP_MOVED_PERMANENTLY);
        endif;
        $suggestions = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findArticleSuggestions($article->getId(),$article->getCategorie()->getId());
        return $this->render('index/article.html.twig',['article'=> $article,'suggestions'=>$suggestions]);
    }
}