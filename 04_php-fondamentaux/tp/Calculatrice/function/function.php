<?php

function mathStandardOperation($post)
{
    $input1 = $post["var1"];
    $input2 = $post["var2"];
    $operand = $post["operand"];

    $input1 = str_replace(",", ".", $input1);
    $input2 = str_replace(",", ".", $input2);

    if (is_numeric($input1) && is_numeric($input2)) {
        switch ($operand) {
            case "add":
                return $input1 + $input2;

            case "substract":
                return $input1 - $input2;

            case "multiply":
                return $input1 * $input2;

            case "divide":
                return $input2 != 0 ? $input1 / $input2 : "division par zéro";

            case "modulo":
                return $input2 != 0 ? $input1 % $input2 : "division par zéro";

            default:
                return "Erreur operand ._.";
        }
    } else {
        return "Error --> input is not a number !";
    }
}
