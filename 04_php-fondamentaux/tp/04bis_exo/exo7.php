<?php
$students = [['name' => 'Marc', 'grades' => [0, 10, 20]], ['name' => 'Kevin', 'grades' => [0, 10, 20]]];
$average = 0;
$nbNote = 1;
$nom = "nameDefault";
for ($i = 0; $i < count($students); $i++) {

    foreach ($students[$i] as $key => $value) {
        // print_r($value);
        echo "\n";
        if($key == 'name'){
            $nom = $value;
        }
        if ($key == 'grades') {
            $nbNote = count($value);
            for ($j = 0; $j < $nbNote; $j++) {
                $average += $value[$j];
            }
            echo "La moyenne de ".$nom." est : ".($average / $nbNote) . PHP_EOL;
            $average = 0;
        }
    }
}
