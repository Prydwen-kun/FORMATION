<?php
// <?php declare(strict_types=1); // strict requirement
//function

function myFunction($arg1, $arg2)
{
    return $arg1 * $arg2;
}
function square(float $arg1): float//typage de fonction
{
    return $arg1 * $arg1;
}

function testZero(float $num1 = 0, float $num2 = 0): string
{
    return $num1 . $num2;
}

echo testZero();

function sayhello($firstname, $lastname)
{
    echo $firstname . ' ' . $lastname . PHP_EOL;
}

$user = ['firstname' => 'Jean-Pierre', 'lastname' => 'Amar'];
foreach ($user as $key => $value) {
    $$key = $value;//cree une variable avec le nom $key qui change pendant le foreach
}

sayhello($firstname, $lastname);

sayhello(lastname:'Jean',firstname:'Pierre'); //rentre les parametres dans un autre ordre

function spreadOperator(...$values){//always as the last parameter
    foreach($values as $value){
        echo $value.PHP_EOL;
    }
}

spreadOperator(1,2,3,4);