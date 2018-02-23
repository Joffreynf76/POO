<?php

class Eleves
{
    public  $nom="Liegeard",
            $prenom="Hugo";
    protected $email="test@gmail.com";

    public function getNomComplet(){
        echo $this->prenom . ' ' . $this->nom;
    }

    public function __construct($nom,$prenom)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
    }

}
    $monEleve=new Eleves();
    echo $monEleve->getNomComplet();

