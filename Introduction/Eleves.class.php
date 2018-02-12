<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/02/2018
 * Time: 11:32
 */

class Eleves
{
    private $Nom,
            $Prenom,
            $Age;

    public function __construct(
        $Nom,
        $Prenom,
        $Age
    )
    {
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Age = $Age;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->Age;
    }






    /**
     * @param mixed $Nom
     */
    public function setNom($Nom): void
    {
        $this->Nom = $Nom;
    }

    /**
     * @param mixed $Prenom
     */
    public function setPrenom($Prenom): void
    {
        $this->Prenom = $Prenom;
    }

    /**
     * @param mixed $Age
     */
    public function setAge($Age): void
    {
        $this->Age = $Age;
    }

    public function getNomComplet(){
        return $this->Prenom.' '. $this->Nom;
    }
}