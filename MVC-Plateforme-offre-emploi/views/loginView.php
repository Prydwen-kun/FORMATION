<?php
$page = 'Login';

include 'views/partials/head.php';
?>

<div class="section back-dark is-fullheight has-text-centered">
    <h1 class="title text-color">Login</h1>
    <div class="card is-shadowless background">
        <div class="card-content">
            <form action="index.php?ctrl=auth&action=login" method="POST">
                <div class="field mb-6 has-text-left">
                    <label class="label text-color" for="username">Username : </label>
                    <div class="control">
                        <input class="input" type="text" name="username" id="username" placeholder="username" required>
                    </div>
                </div>
                <div class="field mb-6 has-text-left">
                    <label class="label text-color" for="password">Password : </label>
                    <div class="control">
                        <input class="input" type="password" name="password" id="password" placeholder="password" required>
                    </div>
                </div>
                <div class="field mb-2">
                    <div class="control has-text-centered">
                        <button class="button is-primary button-color button-text-color" type="submit">Login</button>
                        <a href="index.php?ctrl=auth&action=signup" class="button-color button-text-color has-text-centered button">Sign up</a>
                    </div>
                </div>
            </form>
            <div class="has-text-centered has-text-danger"><?= $error ?></div>
        </div>
    </div>
</div>
<!-- Main content goes here -->

<?php include 'views/partials/foot.php'; ?>