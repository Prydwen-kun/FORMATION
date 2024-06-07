<?php
#Exo 0
for ($i = 0; $i < 10; $i++) {
    echo ($i + 1) . " PHP est FUN FUN FUN.\n";
}

#exo 1
$n = readline("Entre nombre N :");
$somme = 0;
for ($i = 1; $i <= $n; $i++) {
    $somme += $i;
    echo $somme . PHP_EOL;
}
echo "La somme de 1 à " . $n . " est " . $somme . PHP_EOL;

#exo2

$numToMultTable = readline("Afficher la table de multiplication pour le nombre :");
echo "Table de multiplication pour $numToMultTable : \n";
for ($i = 0; $i <= 10; $i++) {
    echo $i."x".$numToMultTable." = ".$i * $numToMultTable . PHP_EOL;
}

#exo3

$isNumPrime = readline("Entrer nombre à check si premier ou non :");
$prime = false;
if ($isNumPrime != 1 && $isNumPrime != 2 && $isNumPrime != 3 && $isNumPrime != 4) {
    for ($i = 2; $i < sqrt($isNumPrime); $i++) {
        if ($isNumPrime % $i == 0) {
            echo "Ce nombre n'est pas premier !\n";
            $prime = false;
            break;
        } else {
            $prime = true;
        }
    }
} else if ($isNumPrime == 1) {
    echo "1 n'est pas premier !\n";
} else if ($isNumPrime == 2) {
    echo "2 est premier !\n";
} else if ($isNumPrime == 3) {
    echo "3 est premier !\n";
} else if ($isNumPrime == 4) {
    echo "4 n'est pas premier !\n";
}
if ($prime) {
    echo "Ce nombre est premier !\n";
}
