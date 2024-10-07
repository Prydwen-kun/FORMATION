<?php
function generateTableFromArray(array $array, $mode = 'nain')
{
    $counter = 0;
    // var_dump($array);
    echo '<table class="tableList"><thead>';
    foreach ($array as $key => $values) {
        foreach ($values as $key => $value) {
            echo '<th>' . str_replace('_', ' ', strtoupper($key)) . '</th>';
        }
        break;
    }
    echo '</thead><tbody>';
    foreach ($array as $column => $items) {
        echo '<tr>';
        $counter++;
        foreach ($items as $row => $item) {

            if ($item != '') {
                // switch
                switch ($row) {
                    case 'ville_natale':
                        echo '<td><a href="listeVille.php?ville=' . $item . '">' . $item . '</a></td>';
                        break;
                    case 'taverne':
                        echo '<td><a href="listeTaverne.php?taverne=' . $item . '">' . $item . '</a></td>';
                        break;
                    case 'ville_depart':
                        echo '<td><a href="listeVille.php?ville=' . $item . '">' . $item . '</a></td>';
                        break;
                    case 'ville_arrivee':
                        echo '<td><a href="listeVille.php?ville=' . $item . '">' . $item . '</a></td>';
                        break;
                    case 'ville':
                        echo '<td><a href="listeVille.php?ville=' . $item . '">' . $item . '</a></td>';
                        break;
                        
                    default:
                        echo '<td>' . $item . '</td>';
                        break;
                }
            } else {
                echo '<td> Aucun </td>';
            }
        }
        //lien vers profil
        if ($mode == 'nain') {
            echo '<td><a href="listeNain.php?nameNain=' . $items['nom'] . '">Détails</a></td>';
        }else if($mode == 'ville'){
            echo '<td><a href="listeVille.php?ville=' . $items['nom'] . '">Détails</a></td>';
        }else if($mode == 'groupe'){
            echo '<td><a href="listeGroupe.php?grp=' . $items['group_ID'] . '">Détails</a></td>';
        }else if($mode == 'taverne'){
            echo '<td><a href="listeTaverne.php?taverne=' . $items['nom'] . '">Détails</a></td>';
        }
        echo '</tr>';
    }



    echo '</tbody><tfoot><tr><th>Count : </th><td colspan="3">' . $counter . '</td></tr></tfoot></table>';
}
