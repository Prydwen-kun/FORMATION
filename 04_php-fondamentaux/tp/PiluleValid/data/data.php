<?php
$argentStart = 500;
$prixTicket = 2;
$nombreTicket = 100;
$firstPrize = 100;
$secondPrize = 50;
$thirdPrize = 20;


$ticketMap = [];
for ($i = 1; $i <= $nombreTicket; $i++) {
    $ticketMap[] = $i;
}

$ticketGagnant = [];

$count = 0;
while ($count < 3) {
    $rand = rand(0, 99);
    if (!in_array($ticketMap[$rand], $ticketGagnant)) {
        $ticketGagnant[] = $ticketMap[$rand];
        $count++;
    }
}
