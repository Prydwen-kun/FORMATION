<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDO</title>
</head>
<body>

  <?php

    if(!empty($_POST)){

      /**
       * extract = fonction qui permet d'extraire les cles d'un tableau associatif et de créer des variables au nom de chaque clé en leur associant leur valeur
       * 
       * par exemple ici cela va donner : $idEmploye = $_POST['idEmploye'];
       * 
       */
      // extract($_POST);
      $idEmploye = $_POST['idEmploye'];


      try{

        $dsn = 'mysql:host=localhost;dbname=entreprise;charset=utf8';
        $dbUser = 'root';
        $dbPwd = '';

        # Connexion a la BDD
        $dbh = new PDO($dsn, $dbUser, $dbPwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

        # Requete que l'on veut soumettre a la BDD
        $query = "SELECT * FROM employe WHERE idEmploye = :idEmploye";

        /**
         * Methode query 
         * 
         * Elle est utilisée pour soumettre une requete au serveur de la BDD
         * Elle est utile dans le cas ou l'on ne traite pas une requete avec des données soumises par une source externe ( ex: formulaire) car elle n'est pas protégé contre les injections SQL
         * 
         * elle éxécuté directement (donc pas besoin du $req->execute();)
         * 
         */

        /**
         * Methode prepare (requete préparées) 
         * 
         * Elle est utilisée pour soumettre une requete au serveur de la BDD
         * Elle est utile dans le cas ou l'on traite une requete avec des données soumises par une source externe ( ex: formulaire) car elle est protégé contre les injections SQL
         * 
         */

        # on prepare la requete
        if( ($req = $dbh->prepare($query)) !==false){

          # on lie les valeurs aux marqueurs
          if($req->bindValue(':idEmploye', $idEmploye)){

            # on execute la requete
            if($req->execute()){
          
              # on recupere les données 
              $res = $req->fetch(PDO::FETCH_ASSOC);
            }else{
              echo 'Un problème est survenu dans l\'éxecution de la requete';
            }


          }else{
            echo 'Un problème est survenu dans la préparation des valeurs';
          }
          $req->closeCursor(); // Termine le traitement de la requete 
        }else {
          echo 'Un problème est survenu dans la préparation de la requete';
        }

        echo 'Bonjour ' . $res['prenom'] . ' ' . $res['nom'];

      } catch(PDOException $e){

        // equivalent a exit (exactement la meme chose)
        die($e->getMessage());

      }
    }
  ?>


  <form method="POST" action="">
    <input type="number" name="idEmploye" placeholder="identifiant utilisateur">
    <button type="submit">Rechercher</button>
  </form>

  
</body>
</html>