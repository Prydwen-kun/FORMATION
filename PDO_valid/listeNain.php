<?php
session_start();
$currentPage = 'Détails nain';
include_once "include/header.php";
require_once "function/utils/bddGenericFunction.php";
require_once "function/connexion/connexionBDD.php";
require_once "function/utils/generateList.php";

if (!empty($_GET['nameNain'])) {
    $nainInfo = getDwarfInfo($dbh, htmlspecialchars($_GET['nameNain']));
} else {
    $nainInfo = [];
    // echo '<pre>Nope error !</pre>';
}


?>
<section class="container">
    <ul class="detailNain">
        <?php
        if ($nainInfo !== []) {
            foreach ($nainInfo as $key => $info) {
                // var_dump($info);
                foreach ($info as $row => $data) {
                    if ($data != '') {
                        switch (true) {
                            case str_contains($row, 'ville'):
                                echo '<li><a href="listeVille.php?ville=' . $data . '">' . $data . '</a></li>';
                                break;
                            case str_contains($row, 'taverne'):
                                echo '<li><a href="listeTaverne.php?taverne=' . $data . '">' . $data . '</a></li>';
                                break;
                            default:
                                echo '<li>' . $row . ' : ' . $data . '</li>';
                                break;
                        }
                    } else {
                        echo '<li> N/A </li>';
                    }
                }
            }
        } else {
            echo '<li>Aucune nain sélectionné</li>';
        }
        ?>
    </ul>
</section>
<?php
include_once "include/footer.php";
session_write_close();
?>