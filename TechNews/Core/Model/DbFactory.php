<?php


namespace Core\Model;


class DbFactory
{
    public static function PdoFactory(){
        $pdo = new \PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASW);

        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
    public static function IdiormFactory(){
        ORM::configure('mysql:host='.DBHOST.';dbname='.DBNAME);
        ORM::configure('username', DBUSER);
        ORM::configure('password', DBPASW);

        ORM::configure('id_column_overrides', array(
            'article' => 'IDARTICLE',
            'view_articles' => 'IDARTICLE',
        ));
    }
}