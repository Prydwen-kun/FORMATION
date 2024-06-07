<?php

#EXO BONUS

//ligne 1 = 0
//ligne n = 
//array 2D = [8][5] => 
function rectangle($longueur, $hauteur)
{
    for ($i = 0; $i < $hauteur; $i++) {
        for ($j = 0; $j < $longueur; $j++) {

            echo " * ";
        }
        echo "\n";
    }
}

rectangle(8, 5);
echo "\n\n";
function carre($cote)
{
    for ($i = 0; $i < $cote; $i++) {
        for ($j = 0; $j < $cote; $j++) {

            echo " * ";
        }
        echo "\n";
    }
}

carre(6);

function pyramide($pyramideBase)
{
    $k = 0;
    for ($i = 0; $i <= $pyramideBase; $i++) {
        for ($k; $k < $pyramideBase; $k++) {
            echo " ";
        }
        $k = $i;
        for ($j = 0; $j < $i; $j++) {

            echo "*";
            echo " ";
        }
        echo "\n";
    }
    echo "\n";
}

pyramide(8);

function triangleRectangle($base)
{

    for ($i = 0; $i <= $base; $i++) {
        for ($j = 0; $j < $i; $j++) {

            echo " * ";
        }
        echo "\n";
    }
}

triangleRectangle(7);