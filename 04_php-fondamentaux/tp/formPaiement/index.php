<?php
$currentPage = "index";

include "inc/head.php";

include "data/data.php";
include "lib/utils/function.php";
include "lib/_helpers/tools.php";

session_start();
if (!isset($_SESSION['currentForm'])) {
    $_SESSION['currentForm'] = 1;
}
if (isset($_GET['form'])) {
    $_SESSION['currentForm'] = $_GET['form'];
}

if (isset($_SESSION['currentForm'])) {
    $currentForm = $_SESSION['currentForm'];
}

//save form data through POST
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $_SESSION['formData'][$key] = $value;
    }
}


?>
<header class="container header">
    <?php
    include "inc/nav.php";
    ?>
</header>
<section class="container container1">
    <form action="<?php nextForm($currentForm) ?>" id="form1" method="post">
        <?php

        switch ($currentForm) {
            case 1:
                echo '<div class="form-group mt-3">';
                echo '<label for="nom">Nom : </label>';
                echo '<input class="form-control" type="text" name="nom" id="nom" placeholder="Nom..."></div>';

                echo '<div class="form-group mt-3">';
                echo '<label for="prenom">Prénom : </label>';
                echo '<input class="form-control" type="text" name="prenom" id="prenom" placeholder="Prénom..."></div>';

                echo '<div class="form-group mt-3">';
                echo '<label for="email">Email : </label>';
                echo '<input class="form-control" type="email" name="email" id="email" placeholder="email@email.com..."></div>';
                break;

            case 2:
                echo '<div class="form-group mt-3">';
                echo '<label for="phone">Phone number : </label>';
                echo '<input class="form-control" type="tel" name="phone" id="phone" placeholder=""></div>';

                break;
            case 3:
                echo '<div class="form-group mt-3">';
                echo '<label for="cardNum">card number : </label>';
                echo '<input class="form-control" type="number" name="cardNumber" id="cardNum" placeholder="000"></div>';

                echo '<div class="form-group mt-3">';
                echo '<label for="ccv">CCV : </label>';
                echo '<input class="form-control" type="number" name="CCV" id="ccv" placeholder="888"></div>';

                break;
            case 4:
                foreach ($_SESSION as $key => $value) {
                    if ($key == 'formData') {
                        foreach ($_SESSION['formData'] as $key => $value) {
                            echo '<div>' . $key . ' : ' . $value . '</div>';
                        }
                        break;
                    }
                }

                break;
            default:
                break;
        }

        ?>
        <button type="submit" class="btn btn-primary mt-3">Suivant</button>
    </form>
</section>

<?php

include "inc/foot.php";
?>