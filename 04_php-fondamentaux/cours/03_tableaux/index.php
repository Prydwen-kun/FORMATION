<?php

#tableaux indexe

$student =
    [
        'Paul',
        'Peron',
        [
            12,
            16,
            4
        ]

    ];

// echo $student[2][1];
echo "$student[0] a eu " . $student[2][1] . " en maths\n";
// $name = "Najib";
// echo $name[2]; affiche la lettre j de Najib
$student = ['Paul', 'Peron', [[12, 16, 4], [12, 16, 4], [10, 16, 6]]];

echo "$student[1] a eu " . $student[2][2][2] . " en histoire.".PHP_EOL;

#tableau associatif
// 'cle' => valeur
$student = ['firstName' => 'Paul', 'lastName' => 'Peron', 'grades' => [12, 16, 4]];
echo $student['firstName'] . ' a eu ' . $student['grades'][0] . ' en philo';
