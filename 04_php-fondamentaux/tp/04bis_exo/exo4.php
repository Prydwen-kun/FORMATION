<?php

#exo4

$input1 = 0;
do {
    $input1 = readline("Entrer un nombre entre 10 et 20 : ");
    if ($input1 < 10) {
        echo "Plus grand\n";
    }
    if ($input1 > 20) {
        echo "Plus petit\n";
    }
} while ($input1 < 10 || $input1 > 20);

#exo4Bis

$randNum = rand(1, 100);
$input1 = 0;
$count = 0;
do {
    $input1 = readline("Devinez le nombre(entre 1 et 100) : ");
    if ($input1 < $randNum) {
        echo "Plus grand\n";
    } elseif ($input1 > $randNum) {
        echo "Plus petit\n";
    }
    $count++;
} while ($input1 != $randNum && $count < 10);
if ($count != 10) {
    echo "GG ! Le nombre est bien : $randNum\n";
    echo "deviné en $count essai !\n";
} else {
    echo "You lose !\n";
}
