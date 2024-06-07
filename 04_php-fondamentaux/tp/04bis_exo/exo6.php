<?php
#exo6

$array = [];
$input = 0;
$moyenne = 0;
while ($input != -1) {
    $input = readline("Entrer la prochaine note : ");
    $array[] = $input;
}
for ($i = 0; $i < count($array) - 1; $i++) {

    echo ($i + 1) . " note :" . $array[$i] . PHP_EOL;

    $moyenne += $array[$i];
}

#exo6Bis
$moyenne = $moyenne / (count($array) - 1);
echo "La moyenne est : " . $moyenne . PHP_EOL;
