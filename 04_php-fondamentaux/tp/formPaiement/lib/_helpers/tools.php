<?php

function debug(...$var)
{

    echo '<div class="container mt-5">';
    var_dump(...$var);
    echo '</div>';
}
