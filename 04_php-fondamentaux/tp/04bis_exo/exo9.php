<?php

#exo9
$arrayRand = [];
for ($i = 0; $i < 20; $i++) {
    $arrayRand[] = rand(-100, 100);
}
$arrayNeg = [];
$arrayPos = [];
for ($i = 0; $i < count($arrayRand); $i++) {
    if ($arrayRand[$i] >= 0) {
        $arrayPos[] = $arrayRand[$i];
    } else {
        $arrayNeg[] = $arrayRand[$i];
    }
}
echo "Tableau positif :\n";
for ($i = 0; $i < count($arrayPos); $i++) {
    echo $arrayPos[$i].PHP_EOL;
}
echo "\n";
echo "Tableau negatif :\n";
for ($i = 0; $i < count($arrayNeg); $i++) {
    echo $arrayNeg[$i].PHP_EOL;
}
