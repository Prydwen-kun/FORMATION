<?php

#exo5
$nbFacture = readline("Entrer le nombre de facture à saisir : ");
$somme = 0;
$depense = 0;
for ($i = 0; $i < $nbFacture; $i++) {
    $depense = readline("Entrer la " . $i+1 . " dépense : ");
    $somme += $depense;
}
echo "Total des dépenses : ".$somme.PHP_EOL;
