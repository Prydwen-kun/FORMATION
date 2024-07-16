<?php

function afficherAchat()
{
    if (isset($_SESSION['achat'])) {
        $achat = $_SESSION['achat'];
        sort($achat);
        foreach ($achat as $key => $value) {
            echo '<p>Ticket n°' . $value . '</p>';
        }
    }
}

function acheterTicket(int $prixTicket)
{
    if (isset($_POST['ticket'])) {
        if (is_numeric($_POST['ticket'])) {
            if (
                $_SESSION['argentRestant'] >= $prixTicket &&
                count($_SESSION['achat']) < 100 &&
                $_POST['ticket'] <= count($_SESSION['ticketMap']) &&
                ($prixTicket * $_POST['ticket']) <= $_SESSION['argentRestant']
            ) {
                $randKey = array_rand($_SESSION['ticketMap'], $_POST['ticket']);

                if (!is_array($randKey)) {
                    $randKey = [$randKey];
                }

                foreach ($randKey as $key) {
                    if (!in_array($_SESSION['ticketMap'][$key], $_SESSION['achat'])) {
                        $_SESSION['achat'][$key] = $_SESSION['ticketMap'][$key];
                        unset($_SESSION['ticketMap'][$key]);
                        $_SESSION['argentRestant'] -= $prixTicket;
                    }
                }

                if (count($_SESSION['achat']) == 100) {
                    echo '<p>Tout les tickets ont été acheté.</p>';
                }
            } else if (
                $_POST['ticket'] > count($_SESSION['ticketMap']) &&
                ($prixTicket * $_POST['ticket']) <= $_SESSION['argentRestant'] &&
                !empty($_SESSION['ticketMap'])
            ) {
                $maxTicket = count($_SESSION['ticketMap']);

                $randKey = array_rand($_SESSION['ticketMap'], $maxTicket);

                if (!is_array($randKey)) {
                    $randKey = [$randKey];
                }

                foreach ($randKey as $key) {
                    if (!in_array($_SESSION['ticketMap'][$key], $_SESSION['achat'])) {
                        $_SESSION['achat'][$key] = $_SESSION['ticketMap'][$key];
                        unset($_SESSION['ticketMap'][$key]);
                        $_SESSION['argentRestant'] -= $prixTicket;
                    }
                }

                if (count($_SESSION['achat']) == 100) {
                    echo '<p>Tout les tickets ont été acheté.</p>';
                }
            } else if (
                $_POST['ticket'] <= count($_SESSION['ticketMap']) &&
                ($prixTicket * $_POST['ticket']) > $_SESSION['argentRestant']
            ) {
                $affordableNum = floor($_SESSION['argentRestant'] / $prixTicket);
                if ($affordableNum == 0) {
                    return;
                }
                $randKey = array_rand($_SESSION['ticketMap'], $affordableNum);

                if (!is_array($randKey)) {
                    $randKey = [$randKey];
                }

                foreach ($randKey as $key) {
                    if (!in_array($_SESSION['ticketMap'][$key], $_SESSION['achat'])) {
                        $_SESSION['achat'][$key] = $_SESSION['ticketMap'][$key];
                        unset($_SESSION['ticketMap'][$key]);
                        $_SESSION['argentRestant'] -= $prixTicket;
                    }
                }

                if (count($_SESSION['achat']) == 100) {
                    echo '<p>Tout les tickets ont été acheté.</p>';
                }
            }
        }
    }
}

function tirage()
{
    $num = 1;
    if (isset($_GET['tirage'], $_SESSION['award'])) {
        if ($_GET['tirage'] == 'true' && count($_SESSION['achat']) >= 1) {
            foreach ($_SESSION['ticketGagnant'] as $key => $value) {
                echo '<p>N°' . $num . ' gagnant : ' . $value;
                if (in_array($value, $_SESSION['achat'])) {
                    echo ' Ticket Gagnant !!';
                    if ($_SESSION['award'] == 'false') {
                        switch ($key) {
                            case 0:
                                $_SESSION['argentRestant'] += 100;
                                break;
                            case 1:
                                $_SESSION['argentRestant'] += 50;
                                break;
                            case 2:
                                $_SESSION['argentRestant'] += 20;
                                break;
                        }
                    }
                }
                echo '</p>';
                $num++;
            }
            $_SESSION['award'] = 'true';
        } else if (count($_SESSION['achat']) == 0) {
            echo '<p>Besoin d\'au moins un ticket pour lancer un tirage!</p>';
        }
    }
}
