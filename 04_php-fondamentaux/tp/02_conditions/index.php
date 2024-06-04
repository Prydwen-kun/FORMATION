<?php

/**
 *  operateur comparaison
 * 
 *  ==
 *  ===
 *  !=
 *  !==
 *  <
 *  >
 *  <=
 *  >=
 * 
 * operateur logique
 *    && and
 *    || or
 *    ! not
 *    xor
 */
$a = true;
$b = true;
$c = 'oui';
if ($a and $b) {
    echo $c . "\n";
}
if ($a and $b) {
    echo $c . "\n";
}
echo "/////////////////////////" . "\n";

$temp = "ensoleillé";
if ($temp === "ensoleillé") {
    echo "beau\n";
} else {
    echo "pas beau\n";
}

$input = readline("entre nombre : ");
if ($input >= 0) {
    echo "positif\n";
} else {
    echo "negatif\n";
}

$input2 = readline("entre nombre entier: ");
if ($input2 < 20) {
    echo $input2 * 2;
    echo PHP_EOL;
}

//exo3

$input3 = readline("Entre moyenne :");
if ($input3 == 20) {
    echo "gg\n";
} elseif ($input3 >= 16) {
    echo " tres bien\n";
} else {
    echo "garbage\n";
}

//4

$input4 = readline("Entre nb 1:");
$input5 = readline("entre nb 2:");

if ($input4 < 0 || $input5 < 0) {
    echo "negatif\n";
} else {
    echo "positif\n";
}

//5

$input6 = readline("entre num jour : ");
switch ($input6) {
    case 1:
        echo "lundi\n";
        break;
    case 2:
        echo "mardi\n";
        break;
    case 3:
        echo "mercredi\n";
        break;
    case 4:
        echo "jeudi\n";
        break;
    case 5:
        echo "vendredi\n";
        break;
    case 6:
        echo "samedi\n";
        break;
    case 7:
        echo "dimanche\n";
        break;
}

//6
$input7 = readline("choisi 1. coca  2.eau 3.cafe : ");
$input8 = readline("sucre y/n : ");
if ($input7 == 1 && $input8 == 'y') {
    echo "coca sucre\n";
} elseif ($input7 == 1 && $input8 == 'n') {
    echo "coca sans sucre\n";
}
if ($input7 == 2 && $input8 == 'y') {
    echo "eau sucre\n";
} elseif ($input7 == 2 && $input8 == 'n') {
    echo "eau sans sucre\n";
}
if ($input7 == 3 && $input8 == 'y') {
    echo "cafe sucre\n";
} elseif ($input7 == 3 && $input8 == 'n') {
    echo "cafe sans sucre\n";
}
