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

    public function fetchAll(
        $where ='',
        $orderby = '',
        $limit = '',
        $offset = ''
    ){
        $sql = "SELECT * FROM " . $this->_table;
        if($where != '') {
            $sql .= ' WHERE ' . $where;
        }
        if($orderby != '') {
            $sql .= ' ORDER BY ' . $orderby;
        }
        if($limit !='') {
            $sql .= ' LIMIT ' . $limit;
        }
        if($offset != '') {
            $sql .= ' OFFSET ' . $offset;
        }


        $sth = $this->_db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(
            \PDO::FETCH_CLASS,
            $this->_classToMap
        );
    }


}