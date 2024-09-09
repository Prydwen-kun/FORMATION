<?php
$dsn = 'mysql:host=localhost;dbname=naindb;charset=utf8';
$dbUser = 'root';
$dbPwd = '';

try {
    $dbh = new PDO($dsn, $dbUser, $dbPwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo '<pre>Erreur connexion DB ! ' . $e . '</pre>';
}
