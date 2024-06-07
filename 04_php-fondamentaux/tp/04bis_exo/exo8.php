<?php

#Exo8

$vehicules0 = [
    'voitures' => ['C3 aircross', 'Passat', 'Dacia Sandero'],
    'Camions' => ['Renault truck', 'Mercedes-Benz Unimog']
];

// var_dump($vehicules0);

foreach ($vehicules0 as $key => $value) {
    echo "Type véhicule : " . $key . PHP_EOL;
    echo "Marque :\n";
    for ($i = 0; $i < count($value); $i++) {
        echo $value[$i] . PHP_EOL;
    }
    echo "\n";
}

$vehicules1 = [
    ['voitures' => ['C3 aircross', 'Passat', 'Dacia Sandero']],
    ['camions' => ['Renault truck', 'Mercedes-Benz Unimog']]
];

for ($i = 0; $i < count($vehicules1); $i++) {
    foreach ($vehicules1[$i] as $key => $value) {
        echo "Type véhicule : " . $key . PHP_EOL;
        echo "Marque :\n";
        for ($j = 0; $j < count($value); $j++) {
            echo $value[$j] . PHP_EOL;
        }
        echo "\n";
    }
}
