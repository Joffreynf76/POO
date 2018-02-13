<?php

namespace Core\Model;


abstract class DbTable
{
    protected $_table;
    protected $_primary;
    protected $_classToMap;
    private $_db;

    public function __construct()
    {
        $this->_db=DbFactory::PdoFactory();
    }

    public function fetchAll(){
        $sql = "SELECT * FROM " . $this->_table;
        $sth = $this->_db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(
            \PDO::FETCH_CLASS,
            $this->_classToMap
        );
    }


}