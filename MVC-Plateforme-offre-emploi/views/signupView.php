<?php
$page = 'Signup';

include 'views/partials/head.php';
?>

<script>
    document.getElementById('password').addEventListener('change', (event) => {
        const password = event.target.value;
        const errorElement = document.getElementById('pwd-error');

        if (password.length < 5) {
            errorElement.textContent = 'Password must be at least 5 characters long.';
            event.target.classList.add('is-danger');
        } else {
            errorElement.textContent = '';
            event.target.classList.remove('is-danger');
            event.target.classList.add('is-success');
        }
    });
</script>

<div class="section back-dark is-fullheight has-text-centered">
    <h1 class="title text-color">Sign Up</h1>
    <div class="card is-shadowless background">
        <div class="card-content">
            <form action="index.php?ctrl=auth&action=signup" method="POST">
                <div class="field mb-6 has-text-left">
                    <label class="label text-color" for="username">Username : </label>
                    <div class="control">
                        <input class="input" type="text" name="username" id="username" placeholder="username" required>
                    </div>
                </div>
                <div class="field mb-6 has-text-left">
                    <label class="label text-color" for="email">Email : </label>
                    <div class="control">
                        <input class="input" type="email" name="email" id="email" placeholder="email@email.em" required>
                    </div>
                </div>
                <div class="field mb-6 has-text-left">
                    <label class="label text-color" for="password">Password : </label>
                    <div class="control">
                        <input class="input" type="password" minlength="5" name="password" id="password" placeholder="password" required>
                    </div>
                </div>
                <div class="field mb-6 has-text-left">
                    <label class="label text-color" for="specialite">Spécialité : </label>
                    <div class="select">
                        <select name="specialite" id="specialite">
                            <option value="1">Programmation</option>
                            <option value="2">Designer</option>
                        </select>
                    </div>
                </div>
                <div class="field mb-6 has-text-left">
                    <label class="label text-color checkbox" for="entreprise">
                        <input type="checkbox" name="entreprise" id="entreprise" required> Entreprise
                        <!-- 1-admin 2-entreprise 3-etudiant -->
                    </label>

                </div>
                <div class="field mb-2">
                    <div class="control has-text-centered">
                        <button class="button is-primary button-color button-text-color" type="submit">Sign Up</button>
                        <a href="index.php?ctrl=auth&action=login" class="button-color button-text-color has-text-centered button">Login</a>
                    </div>
                </div>
            </form>
            <div class="has-text-centered has-text-danger"><?= $error ?></div>
            <div class="has-text-centered has-text-danger" id="pwd-error"></div>
        </div>
    </div>
</div>
<!-- Main content goes here -->

<?php include 'views/partials/foot.php'; ?>