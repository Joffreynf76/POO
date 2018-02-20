<?php

namespace App\Service\Article;


use Symfony\Component\Yaml\Yaml;
class ArticleProvider
{
    public function getArticles(){
        $article = Yaml::parseFile('../src/Service/Article/articles.yaml');
        return $article['data'];
    }
}