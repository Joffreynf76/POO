<?php

namespace Core;

class Core
{
   public function __construct($params)
   {
       #print_r($params);
       if(empty($params)) :
            $params['controller']='news';
            $params['action']='index';
       endif;
       $controller = 'Application\Controller\\'.ucfirst($params['controller']).'Controller';
       $action = $params['action'].'Action';
       if(file_exists(PATH_ROOT.'\\'.$controller.'.php')) {
           $obj = new $controller;
           if(method_exists($obj,$action)){
                $obj->$action();

           }else {
               echo "<h1>Cette action n'existe pas </h1>";
           }
       }else {
           echo "<h1>Ce controlleur n'existe pas</h1>";
       }



      /* if($controller == 'news' && $action == 'index'){
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
       }*/
   }

}