<?php
include "inc/head.php";

include "data/data.php";
include "function/function.php";


session_start();
if (!isset($_SESSION['groceries_list'])) {
    $_SESSION['groceries_list'] = [];
}

if (isset($_GET['cart_add'])) {
    array_push($_SESSION['groceries_list'], $inventaire[intval($_GET['cart_add'])]);
    header("Location: index.php?add=true");
}

if (isset($_GET['cart_delete'])) {
    array_splice($_SESSION['groceries_list'], intval($_GET['cart_delete']), 1);
    header("Location: index.php?delete=true");
}



?>

<section class="container mt-5">
    <form action="" method="" id="form1">
        <input type="text">
        <input type="submit" class="submit" value="submit">
        <button class="button">Button</button>
        <div class="button"><a href="./log/logout.php" class="button my-2">Logout</a></div>

    </form>
    <div class="container">
        <div class="row">
            <div class="col height50vh">
                <h2>Ajouter article</h2>
                <table class="table table-dark table-striped table-hover" id="table_inventaire">
                    <thead>
                        <tr>
                            <th scope="col">Article</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayInventaire($inventaire); ?>
                    </tbody>

                </table>
            </div>
            <div class="col height50vh">
                <h2>Liste de course</h2>
                <table class="table table-dark table-striped table-hover" id="table_panier">
                    <thead>
                        <tr>
                            <th scope="col">Panier</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayCart($_SESSION['groceries_list']); ?>
                    </tbody>

                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>Total Panier</h2>
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        totalCart($_SESSION['groceries_list']);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
include "inc/foot.php";
?>