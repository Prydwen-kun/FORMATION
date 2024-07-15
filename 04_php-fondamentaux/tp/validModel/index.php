<?php
$currentPage = "index";

include "inc/head.php";

include "data/data.php";
include "lib/utils/function.php";
include "lib/_helpers/tools.php";

session_start();
if (!isset($_SESSION['storyIndex'])) {
    $_SESSION['storyIndex'] = 0;
} else if (isset($_POST['goto'])) {
    $_SESSION['storyIndex'] = $_POST['goto'];
}


?>
<header class="">
    header
</header>
<section class="container">
   section
</section>

<?php
debug($currentPage);
include "inc/foot.php";
?>