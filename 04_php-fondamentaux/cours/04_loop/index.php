<?php
#COURS LOOP


$array = ['name0' => 'jean','name1'=>'michel'];

foreach ($array as $key => $value) {
    # code...
    echo $key.' : '.$value.PHP_EOL;
}