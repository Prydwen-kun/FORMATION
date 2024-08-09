<?php 

  // Data source name
  // $dsn = 'mysql:host=127.0.0.1;dbname=entreprise;charset=utf8';
  $dsn = 'mysql:host=localhost;dbname=entreprise;charset=utf8';
  $username = 'root';
  $password = '';
  // $password = 'root'; // pour mac en local
 
  // connexion sans gestion d'erreur (attention si erreur cela affiche en clair les infos de connexion de la BDD)
  // correct
  // $pdo = new PDO('mysql:host=localhost;dbname=entreprise;charset=utf8', 'root', ''); 
  // avec erreur -(tromper dans le nom de la bdd)
  // $pdo = new PDO('mysql:host=localhost;dbname=enteprise;charset=utf8', 'root', '');

  // solution permettant de ne pas afficher les infos sensible
  // try{

  //   $pdo = new PDO($dsn, $username,$password);
  //   echo 'Connexion réussie';
  // } catch(PDOException $e){
  //   echo 'Connexion échouée : ' . $e->getMessage();
  // }


  // AFFICHAGE DES ERREURS
  // PDO::ERRMODE_EXCEPTION
  // À partir de PHP 8.0.0, c'est le mode par défaut.
  // pour toutes les versions anterieur il faut le mettre dans les options au moment de l'instanciation de PDO

  // try{

  //   $pdo = new PDO($dsn, $username,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  //   echo 'Connexion réussie';

  // } catch(PDOException $e){
  //   echo 'Connexion échouée : ' . $e->getMessage();
  // }


  // AVEC UNE REQUETE d'insertion simple
  // try{

  //   $pdo = new PDO($dsn, $username,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
  //   $query = "INSERT INTO employe VALUES(DEFAULT, 3, 'Kenouche', 'Daris', 'M', 3200, '2024-08-08' )";
  //   // $pdo->prepare($query)->execute();
  //   // $statement, $stmt, $request, $req
  //   // On prépare la requete 
  //   $stmt = $pdo->prepare($query);
  //   $stmt->execute();


  // } catch(PDOException $e){
  //   echo 'Connexion échouée : ' . $e->getMessage();
  // }


  // insertion avec les marqueurs 
  // marqueur ?
  // try{

  //   $pdo = new PDO($dsn, $username,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  //   $employe = [
  //     'idService' => 2,
  //     'nom' => 'Baraka',
  //     'prenom' => 'Najib',
  //     'sexe' => 'M',
  //     'salaire' => 2400,
  //     'dateContrat' => '2024-08-08'
  //   ];

    
  //   $query = "INSERT INTO employe (idService, nom, prenom, sexe, salaire, dateContrat) VALUES(?, ?, ?, ?, ?, ?)";
  //   $stmt = $pdo->prepare($query);

  //   $stmt->bindValue(1, $employe['idService'], PDO::PARAM_INT);
  //   $stmt->bindValue(2, $employe['nom'],  PDO::PARAM_STR);
  //   $stmt->bindValue(3, $employe['prenom'], PDO::PARAM_STR);
  //   $stmt->bindValue(4, $employe['sexe'], PDO::PARAM_STR);
  //   $stmt->bindValue(5, $employe['salaire'], PDO::PARAM_INT);
  //   $stmt->bindValue(6, $employe['dateContrat'], PDO::PARAM_STR);
  //   // diff entre bindValue et bindParam : bindParam la valeur est passer en référence
  //   // $stmt->bindParam(6, $employe['dateContrat']);


  //   $stmt->execute();


  // } catch(PDOException $e){
  //   echo 'Connexion échouée : ' . $e->getMessage();
  // }


  // marqueur nommé (on donne le nom que l'on veut mais en général on donne le meme que celui de la colonne)
  // try{

  //   $pdo = new PDO($dsn, $username,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  //   $employe = [
  //     'idService' => 2,
  //     'nom' => 'Matondo',
  //     'prenom' => 'Anare',
  //     'sexe' => 'M',
  //     'salaire' => 1600,
  //     'dateContrat' => '2024-08-08'
  //   ];

    
  //   $query = "INSERT INTO employe (idService, nom, prenom, sexe, salaire, dateContrat) VALUES(:idService, :nom, :prenom, :sexe, :salaire, :dateContrat)";
  //   $stmt = $pdo->prepare($query);

  //   $stmt->bindParam(':idService', $employe['idService'], PDO::PARAM_INT);
  //   $stmt->bindParam(':nom', $employe['nom'],  PDO::PARAM_STR);
  //   $stmt->bindParam(':prenom', $employe['prenom'], PDO::PARAM_STR);
  //   $stmt->bindParam(':sexe', $employe['sexe'], PDO::PARAM_STR);
  //   $stmt->bindParam(':salaire', $employe['salaire'], PDO::PARAM_INT);
  //   $stmt->bindParam(':dateContrat', $employe['dateContrat'], PDO::PARAM_STR);


  //   $stmt->execute();


  // } catch(PDOException $e){
  //   echo 'Connexion échouée : ' . $e->getMessage();
  // }

  // Si le nom des cles sont les memes que le nom des marqueurs dans la requete
  try{

    $pdo = new PDO($dsn, $username,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $employe = [
      'idService' => 2,
      'nom' => 'Biodore',
      'prenom' => 'Nahdgy',
      'sexe' => 'M',
      'salaire' => 2000,
      'dateContrat' => '2024-08-08'
    ];

    
    $query = "INSERT INTO employe (idService, nom, prenom, sexe, salaire, dateContrat) VALUES(:idService, :nom, :prenom, :sexe, :salaire, :dateContrat)";
    $stmt = $pdo->prepare($query);

    $stmt->execute($employe);


  } catch(PDOException $e){
    echo 'Connexion échouée : ' . $e->getMessage();
  }





