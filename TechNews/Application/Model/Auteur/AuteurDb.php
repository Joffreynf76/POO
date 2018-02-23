<?php

namespace Application\Model\Auteur;


use Core\Model\DbTable;

class AuteurDb extends DbTable
{
    protected $_table      = 'auteur';
    protected $_primary    = 'IDAUTEUR';
    protected $_classToMap = Auteur::class;
}