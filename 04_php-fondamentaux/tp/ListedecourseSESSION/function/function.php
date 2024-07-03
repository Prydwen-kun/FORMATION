<?php

function displayInventaire(array $inventaire)
{
    foreach ($inventaire as $key => $item) {
        echo '<tr><th scope="row">' . $item['name'] . '</th><td>' . $item['price'] . ' G</td>' .

            '<td><a href="?cart_add=' . $key . '" class="button my-2">Ajout au panier' . '</a></td>
    </tr>';

    }
}

function displayCart(array $cart)
{

    foreach ($cart as $key => $item) {
        echo '<tr><th scope="row">' . $item['name'] . '</th><td>' . $item['price'] . ' G</td>' .
            '<td><a href="?cart_delete=' . $key . '" class="button my-2">Supprimer</a></td></tr>';
    }
}

function totalCart(array $cart)
{
    $total = 0;
    $listNames = [];
    foreach ($cart as $item) {
        $total += $item['price'];
        $listNames[] = $item['name'];
    }
    $listNumItem = array_count_values($listNames);

    foreach ($listNumItem as $key => $item) {
        echo '<tr><th scope="row">' . $key . '</th><td> ' . $item . '
        </td>
            <td>
                <a href="?groupDelete=' . $key . '">X</a>
            </td>
        </tr>';
    }

    echo '<tr class="table-primary"><th scope="row">Total : ' . $total . ' G<td></td><td></td></tr>';
}