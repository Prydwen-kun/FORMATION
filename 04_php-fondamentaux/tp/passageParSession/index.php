<?php
include "inc/head.php";
include "function/function.php";


session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    $_SESSION['count']++;
}


?>

<section class="container mt-5">
    <form action="" method="" id="form1">
        <input type="text">
        <input type="submit" class="submit" value="submit">
        <button class="button">Button</button>
        <div class="button"><a href="./log/logout.php" class="button my-2">Logout</a></div>

    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">table</th>
                <th scope="col">column</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>$_SESSION count</th>
                <td><?=$_SESSION['count']?></td>
            </tr>
            <tr class="table-primary">
                <th scope="row">primary</th>
                <td>cell</td>
            </tr>
        </tbody>

    </table>
</section>

<?php
include "inc/foot.php";
?>