<?php

/**
 * Creation d'une class ecole :
 * Une classe php est une entite regroupant des variables et des fonctions.
 * Chacune de ces fonctions aura acces aux variables de cette entite.
 */
class Ecole
{
    # Déclaration des propriétés de notre class ecole
    private $NomEcole,
            $AdresseEcole,
            $DirecteurEcole,
            $Classes = [];

    # Afin de pouvoir attribuer une valeur à mes differenetes variables,
    # je vais mettre en place un constructeur.
    /**
     * Ecole constructor.
     * @param $NomEcole
     * @param $AdresseEcole
     * @param $DirecteurEcole
     */
    public function __construct(
        $NomEcole,
        $AdresseEcole,
        $DirecteurEcole
    )
    {
        $this->NomEcole       = $NomEcole;
        $this->AdresseEcole   = $AdresseEcole;
        $this->DirecteurEcole = $DirecteurEcole;
    }

    /**
     * @return mixed
     */
    public function getNomEcole()
    {
        return $this->NomEcole;
    }

    /**
     * @return mixed
     */
    public function getAdresseEcole()
    {
        return $this->AdresseEcole;
    }

    /**
     * @return mixed
     */
    public function getDirecteurEcole()
    {
        return $this->DirecteurEcole;
    }

    /**
     * @return array
     */
    public function getClasses(): array
    {
        return $this->Classes;
    }





    /**
     * @param mixed $NomEcole
     */
    public function setNomEcole($NomEcole): void
    {
        $this->NomEcole = $NomEcole;
    }

    /**
     * @param mixed $AdresseEcole
     */
    public function setAdresseEcole($AdresseEcole): void
    {
        $this->AdresseEcole = $AdresseEcole;
    }

    /**
     * @param mixed $DirecteurEcole
     */
    public function setDirecteurEcole($DirecteurEcole): void
    {
        $this->DirecteurEcole = $DirecteurEcole;
    }


    /**
     * @param array $Classes
     */
    public function AjouterClasse(Classes $Classes): void
    {
        $this->Classes[] = $Classes;
    }
}

