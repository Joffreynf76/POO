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

$Classes1 = new Classes(
    'Back'
);

$Classes2 = new Classes('Front');



$Eleves1 = new Eleves(
    'Lhermitte',
    'Joffrey',
    20
);

$Eleves2 = new Eleves('Revert','Romain',26);
$Classes1->AjouterEleve($Eleves1);
$Classes2->AjouterEleve($Eleves2);

echo '<br>'.$Classes1->getNomClasse();
echo '<br>'.$Eleves1->getPrenom();

echo '<pre>';
    print_r($Classes1);
    echo '</pre>';

echo '<pre>';
print_r($Classes2);
echo '</pre>';

$Ecole->AjouterClasse($Classes1);
$Ecole->AjouterClasse($Classes2);

echo '<pre>';
print_r($Ecole);
echo '</pre>';

echo '<ol>';
$lesClasses= $Ecole ->getClasses();

foreach ($lesClasses as $objClasse){
    echo '<li>'.$objClasse->getNomClasse().'</li>';
    echo '<ul>';
    $lesEtudiants = $objClasse->getEleves();
        foreach($lesEtudiants as $objEtudiant){
            echo '<li>'.$objEtudiant->getNomComplet().'</li>';

        }
        echo '</ul>';
}
echo '</ol>';