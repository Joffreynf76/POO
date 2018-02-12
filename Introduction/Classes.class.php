<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/02/2018
 * Time: 11:28
 */

class Classes
{
    private $NomClasse,
            $Eleves = [];

    /**
     * Classes constructor.
     * @param $NomClasse
     */
    public function __construct($NomClasse)
    {
        $this->NomClasse = $NomClasse;
    }

    /**
     * @return mixed
     */
    public function getNomClasse()
    {
        return $this->NomClasse;
    }


    /**
     * @param mixed $NomClasse
     */
    public function setNomClasse($NomClasse): void
    {
        $this->NomClasse = $NomClasse;
    }
}