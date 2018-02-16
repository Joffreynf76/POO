<?php
namespace Core\Model;

trait Helper {
    public function generateUrl($controller,$action){
        return PATH_PUBLIC .'/'. $controller.'/'. $action;
    }
    public function generateUfm($mask,Array $valeur= []){
        $search =[];
        foreach ($valeur as $key=>$value){
            $search[]='$'.++$key;
        }
        $url=str_replace($search,$valeur,$mask);

        return PATH_PUBLIC.'/'.$url;
    }
    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}