<?php

namespace App\Controller\TechNews;

use App\Controller\Helper;
use App\Entity\Article;
use App\Entity\Auteur;
use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
#use Doctrine\DBAL\Types\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    use Helper;
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

    /**
     * Formulaire pour ajouter un article
     * @Route("/creer-un-article", name="article_add")
     */
    public function addarticle(Request $request) {
        # Récupération des catégories
        $categories = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        # Création d'un nouvel article
        $article = new Article();
        $auteur = $this->getDoctrine()->getRepository(Auteur::class)->find(1);
        $article->setAuteur($auteur);
        $form = $this->createFormBuilder($article)
        # Champ TITREARTICLE
        ->add('titre', TextType::class, [
            'required'      => true,
            'label'         => false,
            'attr'          => [
                'class'         =>  'form-control',
                'placeholder'   =>  'Titre de l\'Article...'
            ]
        ])
            # Champ Categorie
            ->add('categorie', EntityType::class, [
                'class'  => Categorie::class,
                'choice_label'=>'libelle',
                'required'=>true,
                'expanded'=>false,
                'multiple'=>false,

                'attr'          => [
                    'class'         =>  'form-control',

                ]
            ])
            ->add('contenu', TextareaType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Contenu de l\'Article...'
                ]
            ])
            ->add('featuredimage', FileType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'dropify',

                ]
            ])
            ->add('special', CheckboxType::class, [
                'required'=>false,
                    'label'=>false,



            ])
            ->add('spotlight', CheckboxType::class, [
                    'required'      => false,
                    'label'         => false,

            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Publier',
                'attr'      => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) :
            $article=$form->getData();
            $image=$article->getFeaturedimage();
            $fileName=$this->slugify($article->getTitre()).$image->guessExtension();
            $image->move($this->getParameter('articles_assets-dir'),$fileName);
            $article->setFeaturedimage($fileName);
            $em=$this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('index_article',['libellecategorie'=>$this->slugify($article->getCategorie()->getLibelle()),
                'slugarticle'       => $this->slugify($article->getTitre()),
                'id'                => $article->getId()
            ]);

            endif;
        return $this->render('article/ajouterarticle.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
