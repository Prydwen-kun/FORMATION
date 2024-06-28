<?php
include "inc/head.php";
include "function/function.php";

if (isset($_GET, $_POST) && !empty($_GET)) {
    $history[] = $_GET["store"];
    $history[] = $_POST["var1"] . " " . $_POST["operand"] . " " . $_POST["var2"] . " = " . $_POST["result"]."     ";
}

?>


<section class="container">
    <a href="index.php">
        <h1>Calculatrice</h1>
    </a>
    <div class="calc_container">
        <form action="<?php

                        echo "?store=";
                        if (isset($history)) {
                            foreach ($history as $value) {
                                echo $value . "     ";
                            }
                        }
                        ?>" id="form1" method="post">
            <input type="text" name="var1" id="inputField1" <?php if (isset($_POST)) {
                                                                echo "value=\"" . $_POST["var1"] . "\"";
                                                            } ?>>
            <select name="operand" id="operand">
                <option value="add" <?php if (isset($_POST) && $_POST["operand"] == "add") {
                                        echo "selected=\"selected\"";
                                    } else {
                                        echo "selected=\"selected\"";
                                    } ?>>+</option>
                <option value="substract" <?php if (isset($_POST) && $_POST["operand"] == "substract") {
                                                echo "selected=\"selected\"";
                                            } ?>>-</option>
                <option value="multiply" <?php if (isset($_POST) && $_POST["operand"] == "multiply") {
                                                echo "selected=\"selected\"";
                                            } ?>>x</option>
                <option value="divide" <?php if (isset($_POST) && $_POST["operand"] == "divide") {
                                            echo "selected=\"selected\"";
                                        } ?>>÷</option>
                <option value="modulo" <?php if (isset($_POST) && $_POST["operand"] == "modulo") {
                                            echo "selected=\"selected\"";
                                        } ?>>modulo</option>
            </select>
            <input type="text" name="var2" id="inputField2" <?php if (isset($_POST)) {
                                                                echo "value=\"" . $_POST["var2"] . "\"";
                                                            } ?>>
            <input type="submit" value="=" id="submit">
            <?php
            if (isset($_POST)) {
                echo "<input form=\"form1\" name=\"result\" class=\"result\" value=\"" . mathStandardOperation($_POST) . "\">";
            }
            ?>
        </form>


        <div class="historique">
            <h2>Historique</h2>

            <textarea name="history" id="historique" form="form1" disabled readonly rows="10">
                <?php

                foreach ($history as $key => $value) {

                    echo $value . PHP_EOL;
                }

                ?>

            </textarea>

        </div>
    </div>
</section>

<?php
include "inc/foot.php";
?>