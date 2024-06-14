<?php

//EXO FUNCTION

#exo 0

function addition($num1, $num2)
{
    return $num1 + $num2;
}
function soustraction($num1, $num2)
{
    return $num1 - $num2;
}
function mult($num1, $num2)
{
    return $num1 * $num2;
}
function divide($num1, $num2)
{
    return $num1 / $num2;
}

#exo1

function palindrome()
{
    $mot = readline("Entrer mot : ");
    $mot = str_split($mot);
    $motInverse = [];
    for ($i = count($mot) - 1; $i >= 0; $i--) {

        $motInverse[] = $mot[$i];
    }
    print_r($motInverse);
    if ($motInverse == $mot) {
        echo 'palindrome' . PHP_EOL;
    } else
        echo "not palindrome" . PHP_EOL;
}

// palindrome();

function valeurAbsolue($num): float
{
    if ($num < 0)
        return $num * -1;
    else
        return $num;
}

// echo valeurAbsolue(-5) . PHP_EOL;

function supprVoyelles($chaine)
{
    $vowels = ['a', 'e', 'i', 'o', 'u', 'y', 'A', 'E', 'I', 'O', 'U', 'Y'];
    $tab = str_split($chaine);
    $chaineNoVowels = [];
    $flagVowel = false;
    for ($i = 0; $i < count($tab); $i++) {
        foreach ($vowels as $letterTest) {
            if ($tab[$i] != $letterTest) {
                $flagVowel = false;
            } else {
                $flagVowel = true;
                break;
            }
        }
        if (!$flagVowel) {
            $chaineNoVowels[] = $tab[$i];
        }
    }

    return implode($chaineNoVowels);
}

// echo supprVoyelles('Maintenant') . PHP_EOL;

function nombreVoyelles($chaine)
{
    $vowels = ['a', 'e', 'i', 'o', 'u', 'y', 'A', 'E', 'I', 'O', 'U', 'Y'];
    $tab = str_split($chaine);
    $countVowel = 0;
    for ($i = 0; $i < count($tab); $i++) {
        foreach ($vowels as $letterTest) {
            if ($tab[$i] == $letterTest) {
                $countVowel++;
                break;
            }
        }
    }

    return $countVowel;
}

// echo nombreVoyelles('MAintEnant');

#exo 5

function inverseOrdreMot($chaine)
{
    $wordsArray = explode(' ', $chaine);
    $chaineRenverse = [];
    for ($i = count($wordsArray) - 1; $i >= 0; $i--) {
        $chaineRenverse[] = $wordsArray[$i];
    }
    return implode(' ', $chaineRenverse);
}

// echo inverseOrdreMot('Je suis renverse bonjour');

#exo6

function passwordGenerate($longueur)
{
    $arrayRandMaj = [];
    $arrayRandMin = [];
    $arrayRandNum = [];
    $password = [];
    for ($i = 0; $i < $longueur; $i++) {
        $arrayRandMaj[$i] = chr(rand(65, 90));
        $arrayRandMin[$i] = chr(rand(97, 122));
        $arrayRandNum[$i] = rand(0, 9);
    }
    for ($i = 0; $i < $longueur; $i++) {
        $key = rand(1, 3);
        switch ($key) {
            case 1:
                $password[$i] = $arrayRandMaj[$i];
                break;
            case 2:
                $password[$i] = $arrayRandMin[$i];
                break;
            case 3:
                $password[$i] = $arrayRandNum[$i];
                break;

            default:

                break;
        }
    }
    return implode($password);
}

// echo passwordGenerate(5);

#exo7

function imcCalculator($masse, $taille)
{
    $iMC = $masse / ($taille * $taille);

    return $iMC;
}

// echo imcCalculator(89,1.80);

#exo8

function totalPlusTVA($horsTaxe, $tauxTVA)
{

    return ($horsTaxe * $tauxTVA) + $horsTaxe;
}

// echo totalPlusTVA(100,0.2);

#exo9

function remise($totalAchat, $remise)
{
    return $totalAchat - ($totalAchat * $remise);
}

// echo remise(100, 0.2);

#exo10

$books = [
    [
        'name' => 'livre1',
        'author' => 'auteur1',
        'releaseYear' => 2023,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'livre2',
        'author' => 'auteur2',
        'releaseYear' => 2024,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'livre3',
        'author' => 'auteur3',
        'releaseYear' => 2025,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'livre4',
        'author' => 'auteur5',
        'releaseYear' => 2026,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'livre5',
        'author' => 'auteur5',
        'releaseYear' => 2027,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'livre6',
        'author' => 'auteur6',
        'releaseYear' => 2028,
        'purchaseUrl' => 'http://example.com'
    ]
];

function filtreLivre($auteur, $books)
{
    $nomLivre = '';
    for ($i = 0; $i < count($books); $i++) {
        foreach ($books[$i] as $key => $value) {
            if ($key == 'name') {
                $nomLivre = $value;
            }

            if ($key == 'author' && $value == $auteur) {
                echo $nomLivre . ' écrit par ' . $value . PHP_EOL;
            }
        }
    }
}

// filtreLivre('auteur5', $books);

#exo 11

$movies = [
    [
        'title' => 'titre1',
        'year' => 2015,
        'actors' => ['acteur1', 'acteur2']
    ],
    [
        'title' => 'titre15',
        'year' => 1994,
        'actors' => ['acteur9', 'acteur2']
    ],
    [
        'title' => 'titre16',
        'year' => 1994,
        'actors' => ['acteur9', 'acteur2']
    ],
    [
        'title' => 'titre2',
        'year' => 1998,
        'actors' => ['acteur3', 'acteur4']
    ],
    [
        'title' => 'titre3',
        'year' => 2010,
        'actors' => ['acteur5', 'acteur3']
    ],
    [
        'title' => 'titre32',
        'year' => 2010,
        'actors' => ['acteur5', 'acteur3']
    ],
    [
        'title' => 'titre4',
        'year' => 2004,
        'actors' => ['acteur1', 'acteur2']
    ]
];

function filterMoviesPerYear($anneeSortie, $movies)
{
    $filmOfYear = [];
    for ($i = 0; $i < count($movies); $i++) {
        foreach ($movies[$i] as $key => $value) {
            if ($key == 'year' && $value == $anneeSortie) {
                $filmOfYear[] = $movies[$i]['title'];
            }
        }
    }
    foreach ($filmOfYear as $film) {
        echo $film . PHP_EOL;
    }
}
// filterMoviesPerYear(1994,$movies);
function sortMoviesPerYear($movies)
{
    $filmOfYear = [];

    for ($i = 0; $i < count($movies); $i++) {
        if (!in_array($movies[$i]['year'], $filmOfYear)) {
            $filmOfYear[$i] = $movies[$i]['year'];
        }
    }
    sort($filmOfYear);
    print_r($filmOfYear);
    foreach ($filmOfYear as $year) {
        foreach ($movies as $movie) {
            foreach ($movie as $key => $value) {
                if ($key == 'year' && $value == $year) {
                    echo $movie['title'] . ' sorti ' . $movie['year'] . PHP_EOL;
                }
            }
            // print_r($movie);
        }
    }
}
// sortMoviesPerYear($movies);

#exo12
$facture = [];

function ajoutArticle(array &$facture)
{
    $nomArticle = readline('Rentrez le nom de l\'article : ');
    $quantite = readline('Nombre de produit : ');
    $prixUnite = readline('Prix de l\'article : ');
    $facture[] = ['nom' => $nomArticle, 'quantite' => $quantite, 'prix' => $prixUnite];
    // print_r($facture);
}

// ajoutArticle($facture);
// ajoutArticle($facture);

// var_dump($facture);
function afficherFacture($facture)
{
    foreach ($facture as $id => $item) {
        echo $id . '. ';
        foreach ($item as $key => $value) {
            echo $key . ' : ' . $value . PHP_EOL;
        }
    }
}

// afficherFacture($facture);

function totalFacture($facture)
{
    $sum = 0;
    $nbProduit = 0;
    $prix = 0;
    foreach ($facture as $id => $item) {

        foreach ($item as $key => $value) {
            if ($key == 'quantite') {
                $nbProduit = $value;
            } else if ($key == 'prix') {
                $prix = $value;
            }
        }
        $sum += $prix * $nbProduit;
    }
    echo 'Total facture : ' . $sum . PHP_EOL;
}

// totalFacture($facture);

#exo13

function commande($facture)
{
    $sum = 0;
    $nomProduit = readline('Nom du produit : ');
    $nbProduit = readline('Quantité à commander : ');
    $prix = 0;
    $error = false;
    foreach ($facture as $id => $item) {
        foreach ($item as $key => $value) {

            if ($key == 'nom' && $value == $nomProduit && $item['quantite'] - $nbProduit >= 0) {
                $prix = $item['prix'];
                $sum += $prix * $nbProduit;
            } else if ($item['quantite'] - $nbProduit < 0) {
                $error = true;
            }
        }
    }
    switch ($error) {
        case true:
            echo 'Erreur - commande supérieur au stock' . PHP_EOL;
            break;
        case false:
            echo 'Total facture : ' . $sum . PHP_EOL;
            break;
        default:
            break;
    }
}

// commande($facture);

echo 'Choix : 1.Ajouter Article 2.Afficher Stock 3.Commande article -1 to exit : ' . PHP_EOL;

do {
    $input = readline('Entrer choix : ');

    switch ($input) {
        case 1:
            ajoutArticle($facture);
            break;
        case 2:
            afficherFacture($facture);
            break;
        case 3:
            if (!count($facture) < 1)
                commande($facture);
            else
                echo "Error no item in stock DB" . PHP_EOL;
            break;
        default:
            break;
    }
} while ($input != -1);
