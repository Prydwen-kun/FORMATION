<?php

function listeChaine(int $indexStart): string
{
    $datas = [
        ['letter' => 'a', 'goto' => 10],
        ['letter' => 'e', 'goto' => -1],
        ['letter' => 'e', 'goto' => 6],
        ['letter' => 'l', 'goto' => 1],
        ['letter' => 'p', 'goto' => 8],
        ['letter' => 'o', 'goto' => 11],
        ['letter' => 'x', 'goto' => 12],
        ['letter' => 'p', 'goto' => 3],
        ['letter' => 'r', 'goto' => 5],
        ['letter' => 'm', 'goto' => 7],
        ['letter' => 'b', 'goto' => 3],
        ['letter' => 'b', 'goto' => 0],
        ['letter' => 'a', 'goto' => 9]
    ];
    $motCompose = [];
    $i = $indexStart;
    do {
        array_push($motCompose, $datas[$i]['letter']);
        $i = $datas[$i]['goto'];
    } while ($datas[$i]['goto'] != -1);
    if($datas[$i]['goto'] == -1){
        array_push($motCompose, $datas[$i]['letter']);
    }

    return implode($motCompose);
}
