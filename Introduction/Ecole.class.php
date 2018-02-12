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
}