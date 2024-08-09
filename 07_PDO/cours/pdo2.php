<?php 

    /*


     */

  $dsn = 'mysql:host=localhost;dbname=entreprise;charset=utf8';
  $username = 'root';
  $password = '';


  // AVEC SELECT
  // method fecthALL() : récupère plusieurs résultats
  // try{

  //   // $pdo = new PDO($dsn, $username,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  //   $pdo = new PDO($dsn, $username,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC]);

  //   $query = "SELECT * FROM employe";
  //   // $stmt = $pdo->query($query);
  //   $stmt = $pdo->prepare($query);
  //   $stmt->execute();

  //   // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //   $results = $stmt->fetchAll();
  //   echo '<pre>';
  //   print_r($results);
  //   echo '</pre>';

  // } catch(PDOException $e){
  //   echo 'Connexion échouée : ' . $e->getMessage();
  // }




  // methode fectch() : récupère un seul résultat
  try{

    // $pdo = new PDO($dsn, $username,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $pdo = new PDO($dsn, $username,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC]);

    $query = "SELECT * FROM employe WHERE idEmploye = 6";
    // $stmt = $pdo->query($query);
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // $results = $stmt->fetch(PDO::FETCH_ASSOC);
    $results = $stmt->fetch();
    echo '<pre>';
    print_r($results);
    echo '</pre>';

  } catch(PDOException $e){
    echo 'Connexion échouée : ' . $e->getMessage();
  }

