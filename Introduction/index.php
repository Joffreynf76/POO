<?php
# Importaion de la class Ecole
require_once 'Ecole.class.php';
require_once 'Classes.class.php';
require_once 'Eleves.class.php';

/**
 * Creation d'une instance de la classe Ecole.
 * Ici notre variable $Ecole est un objet de la class Ecole.
 * Elle a acces a l'ensemble des variables et fonctions qui la compose.
 */

$Ecole = new Ecole (
    'WF3-Rouen',
    'Place Saint-Marc',
    'Alexandre Martini'
);

# Affichage de l'objet Ecole
//var_dump($Ecole);

//echo $Ecole->getNomEcole();

# Je veux changer le nom de l'ecole ?
$Ecole->setNomEcole('NFactory');
echo '<br>'.$Ecole->getNomEcole();

$Classes = new Classes(
    'Développeur Web'
);

echo '<br>'.$Classes->getNomClasse();

$Eleves = new Eleves(
    'Lhermitte',
    'Joffrey',
    '20'
);

echo '<br>'.$Eleves->getPrenom();