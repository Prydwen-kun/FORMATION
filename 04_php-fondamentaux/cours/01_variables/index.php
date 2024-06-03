<?php
// comment 1 line
#comment 1 line
/*comment multiline */
$var = "php";
/**
 * commence tojours par $
 * que des lettres , des chiffres et underscore
 * nom cohérent
 * commence pas par un chiffre _variable / variable / Variable
 * 
 * CONVENTIONS ECRITURE
 * 
 * Snake Case :  $user_name
 * Camel Case :  $userName
 * Pascal Case : $UserName
 * LowerCase :   $username
 */

/**
 * TYPE DE DONNEES
 * 
 * String
 * int
 * float
 * bool
 * array
 * object
 * null
 * ressources : reference vers une ressource externe (fichier)
 */

#string
$nom = 'Paul';
$message = 'Bonjour , lmao';

#int
$age = 22;

#float
$note = 12.5;

#bool
$isSet = true;
$isSet = false;

#array
//indexé
$fruit = ['pomme', 'banane', 'fraise'];
//association cle => valeur
$fruit = ['pomme' => 'Paul', 'age' => 22];

#object
class Person
{
    
};
$personne = new Person();

#null
$paul = null;

#ressources
$fichier = fopen('monFichier.txt', 'r');

echo $nom;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP cours</title>
</head>

<body>

</body>

</html>