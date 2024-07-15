<?php
$currentPage = "index";

if (session_status() === PHP_SESSION_NONE) session_start();

include "inc/head.php";

include "data/data.php";
include "lib/utils/function.php";
include "lib/_helpers/tools.php";



if (!isset($_SESSION['currentForm'])) {
    $_SESSION['currentForm'] = 1;
}
if (isset($_GET['form'])) {
    $_SESSION['currentForm'] = $_GET['form'];
}

if (isset($_SESSION['currentForm'])) {
    $currentForm = $_SESSION['currentForm'];
}
if (!isset($_SESSION['formData'])) {
    $_SESSION['formData'] = [];
}

formDataTransfer();
debug(empty($_POST));
debug($_POST);
debug($_SESSION);
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
                echo '<input class="form-control" type="text" name="nom" id="nom" placeholder="Nom..." required></div>';

                echo '<div class="form-group mt-3">';
                echo '<label for="prenom">Prénom : </label>';
                echo '<input class="form-control" type="text" name="prenom" id="prenom" placeholder="Prénom..." required></div>';

                echo '<div class="form-group mt-3">';
                echo '<label for="email">Email : </label>';
                echo '<input class="form-control" type="email" name="email" id="email" placeholder="email@email.com..." required></div>';
                break;

            case 2:
                echo '<div class="form-group mt-3">';
                echo '<label for="phone">Phone number : </label>';
                echo '<input class="form-control" type="tel" name="phone" id="phone" pattern=" (?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}" required></div>';
                // 06 40 40 80 25
                break;
            case 3:
                echo '<div class="form-group mt-3">';
                echo '<label for="cardNum">card number : </label>';
                echo '<input class="form-control" type="number" name="cardNumber" id="cardNum" placeholder="000" pattern="(^4[0-9]{12}(?:[0-9]{3})?$)|(^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$)|(3[47][0-9]{13})|(^3(?:0[0-5]|[68][0-9])[0-9]{11}$)|(^6(?:011|5[0-9]{2})[0-9]{12}$)|(^(?:2131|1800|35\d{3})\d{11}$)" required></div>';

                echo '<div class="form-group mt-3">';
                echo '<label for="ccv">CCV : </label>';
                echo '<input class="form-control" type="number" name="CCV" id="ccv" placeholder="888" pattern="/^[0-9]{3,4}$/" required></div>';

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

session_write_close();
include "inc/foot.php";
?>