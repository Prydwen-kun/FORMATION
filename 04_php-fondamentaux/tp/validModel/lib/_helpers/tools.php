<?php

function debug(...$var)
{

    echo '<p>';
    var_dump(...$var);
    echo '</p>';
}