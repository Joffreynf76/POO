<?php


namespace Core\Model;


class DbFactory
{
    public static function PdoFactory(){
        $pdo = new \PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASW);

        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}