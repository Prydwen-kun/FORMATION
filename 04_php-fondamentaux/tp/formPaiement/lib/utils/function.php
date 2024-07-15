<?php

function nextForm($currentForm)
{
    if ($currentForm < 4) {
        echo '?form=' . $currentForm + 1;
    }else{
        echo './log/traitement.php';
    }
}
