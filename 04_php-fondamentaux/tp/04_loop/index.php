<?php
#TP LOOP


$i = 0;
a:

echo $i . "\n";
$i++;
if ($i < 3)
    goto a;
echo PHP_EOL;
//EXOS

#1
function lineBreak()
{
    echo PHP_EOL;
}
$students = ['devweb' => ['daris', 'peter', 'anare'], 'devmobile' => ['anne-laure', 'ken']];
foreach ($students as $key => $value) {
    echo $key . PHP_EOL;
    echo '__________________';
    lineBreak();
    foreach ($value as $index => $etudiant) {
        # code...
        echo $index . '.' . $etudiant . PHP_EOL;
    }
    lineBreak();

}
#2
$cumul = 0;
$i = 0;
$input = readline("Saisissez une valeur (-1 termine la saisie) :");
while ($input != -1) {
    $i++;
    $cumul += $input;
    $input = readline("Saisissez une valeur (-1 termine la saisie) :");
}
echo "Le Total des " . $i . " valeurs saisies est : " . $cumul . PHP_EOL;
#3
$input2 = 0;
$somme = 0;
do {
    $input2 = readline("Saisir une valeur : ");
    $somme += $input2;
} while ($somme < 500);


#4

$count = 0;
$val = 0;
$iteration2 = readline("Veuillez indiquer le nombre de valeurs à saisir :");
for ($i = 1; $i <= $iteration2; $i++) {
    $val = readline("Saisir une valeur : ");
    $count += $val;
}
echo 'Le total des ' . $iteration2 . ' valeur saisies est :' . $count;
lineBreak();

#5



$array = ['name0' => 'jean', 'name1' => 'michel'];

foreach ($array as $key => $value) {
    # code...
    echo $key . ' : ' . $value . PHP_EOL;
}