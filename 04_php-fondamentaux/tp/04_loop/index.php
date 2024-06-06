<?php
#TP LOOP

$i=0;
a:

echo $i;
$i++;
if($i<3)
goto a;

//EXOS

#1
#2
#3
#4
#5



$array = ['name0' => 'jean','name1'=>'michel'];

foreach ($array as $key => $value) {
    # code...
    echo $key.' : '.$value.PHP_EOL;
}