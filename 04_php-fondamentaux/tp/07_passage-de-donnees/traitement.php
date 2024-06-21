<?php

function devineNombre($input1, $randNum, $count)
{
    if ($input1 < $randNum) {
        echo "<p>Plus grand\n</p>";
    } elseif ($input1 > $randNum) {
        echo "<p>Plus petit\n</p>";
    }

    if ($input1 == $randNum && !is_null($input1)) {
        echo "<p>GG ! Le nombre est bien : $randNum\n en $count essai !</p>";
    }
}
