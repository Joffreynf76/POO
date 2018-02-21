<?php

namespace App\Controller\TechNews;

use App\Entity\Article;
use App\Entity\Auteur;
use App\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        $categorie = new Categorie();
        $categorie->setLibelle('Business');

        $auteur = new Auteur();
        $auteur->setNom('Lhermitte');
        $auteur->setPrenom('Joffrey');
        $auteur->setEmail('16978@csmrouen.net');
        $auteur->setPassword('123456');

        $article=new Article();
        $article->setTitre('Ceci est un titre');
        $article->setContenu('Contenu');
        $article->setFeaturedimage('3.jpg');
        $article->setSpecial(0);
        $article->setSpotlight(1);

        $article->setCategorie($categorie);
        $article->setAuteur($auteur);

        $em=$this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->persist($auteur);
        $em->persist($article);
        $em->flush();

        return new Response('Nouvel article ajouté avec un id : '.$article->getId().' et la nouvelle categorie : '. $categorie->getLibelle().' de auteur'. $auteur->getPrenom());
    }
}
