<?php

function nextForm($currentForm)
{
    if ($currentForm < 4) {
        echo '?form=' . $currentForm + 1;
    } else {
        echo './log/traitement.php';
    }
}

function formDataTransfer()
{
    $postBuffer =[];
    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            $postBuffer[$key] = $value;
        }
        $_SESSION['formData'] = array_merge($_SESSION['formData'], $postBuffer);
    }
}
