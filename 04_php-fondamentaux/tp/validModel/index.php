<?php
$currentPage = "Le livre dont vous êtes le héros";

include "inc/head.php";

include "data/data.php";
include "function/function.php";

session_start();
if (!isset($_SESSION['storyIndex'])) {
    $_SESSION['storyIndex'] = 0;
} else if (isset($_POST['goto'])) {
    $_SESSION['storyIndex'] = $_POST['goto'];
}


?>
<header class="header mt-3">
    
</header>
<section class="container mt-5">
   
</section>

<?php
include "inc/foot.php";
?>