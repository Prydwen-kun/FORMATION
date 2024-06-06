<?php
/**
 * 1. creer liste de 1 a 10
 * 2. ajouter 16 24 et 47 a la liste
 * 
 * 3.creer tableau representant une liste de services et leurs descriptions (3)
 * 4. ajouter un service en plus avec sa description
 * 5. modifier la description du 2e element
 */

#1

$liste1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
for ($i = 0; $i < sizeof($liste1); $i++) {
    echo $liste1[$i];
    echo "\n";
}

#2

$liste1[10] = 16;
$liste1[11] = 24;
$liste1[12] = 47;
for ($i = 0; $i < sizeof($liste1); $i++) {
    echo $liste1[$i];
    echo "\n";
}

#3

$services = ['impression' => true, 'connexion' => true, 'deletion' => false];
var_dump($services);
#4

$services['copie'] = true;
var_dump($services);
#5

$services['connexion'] = false;
var_dump($services);