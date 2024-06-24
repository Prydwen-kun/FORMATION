<form action="" id="formSize" method="get">
    <label for="listSize">Nombre par page : </label>
    <input type="range" id="listSize" name="listSize" min="1" max="10" value="<?= isset($_GET['listSize']) ? $_GET['listSize'] : '5' ?>" step="1">
    <p> <?= $userListLength ?> </p>
    <input type="submit" id="listSizeChange" value="Confirm">
</form>