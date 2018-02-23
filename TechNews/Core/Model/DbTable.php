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

    public function fetchOne($search,$column=''){
        empty($column) ? $column=$this->_primary:null;
        $sth = $this->_db->prepare('SELECT * FROM ' . $this->_table .' WHERE ' . $column . '= :search');
        $sth->bindValue(':search',$search, \PDO::PARAM_STR);
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS,$this->_classToMap);
        return $sth->fetch();

    }


}