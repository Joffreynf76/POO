<?php
# Importation de l'autoload de composer
require_once "vendor/autoload.php";
use \Symfony\Component\VarDumper\VarDumper;
# Contenu de demonstration

class  Contact{
    private $firstname,
            $lastname;

    public function __construct($firstname,$lastname)
    {
        $this->firstname=$firstname;
        $this->lastname=$lastname;
    }

}

$unString = "Une chaine de catactere";
$unArray = ['Hugo','Hocine','Benjamin'];
$unObjet = new Contact('Hugo','Liegeard');

# test de VarDumper

VarDumper::dump($unString);
VarDumper::dump($unArray);
VarDumper::dump($unObjet);

