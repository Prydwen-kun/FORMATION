<?php

$a = 2;
$b = 5;
$c = $a;
$a = $b;
$b = $c;

echo 'A egal ' . $a . "\n";
echo 'B egal ' . $b . "\n";
echo 'C egal ' . $c . "\n";
