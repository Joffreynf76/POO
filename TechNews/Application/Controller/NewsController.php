<?php


namespace Application\Controller;


class NewsController
{
    public function indexAction(){
        #include_once PATH_VIEWS. '/news/index.php';
    }
    public function categorieAction(){
        echo "Je suis categorie action";
    }
    public function articleAction(){
        echo "Je suis article action";
    }
}