<?php


class Core
{
   public function __construct($params)
   {
       #print_r($params);
       if(empty($params)) :
            $params['controller']='news';
            $params['action']='index';
       endif;
       $controller = $params['controller'];
       $action = $params['action'];

       if($controller == 'news' && $action == 'index'){
           echo "<h1> Je suis la page d'accueil</h1>";
       }
       if($controller == 'news' && $action == 'categorie'){
           echo "<h1> Je suis la page catégorie</h1>";
       }
       if($controller == 'news' && $action == 'article'){
           echo "<h1> Je suis la page article</h1>";
       }
       if($controller == 'membre' && $action == 'inscription'){
           echo "<h1> Je suis la page d'inscription</h1>";
       }
   }
}