<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Alumni - form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="main_nav">
            <a href="index.php">Home</a>
            <a href="index.php">Liste Alumni</a>
            <a href="index.php">Statistiques</a>
            <a href="ajoutAlumni.php">Ajout Alumni</a>
        </nav>
    </header>
    <section class="container">
        <form class="form_addStudent" id="form1">
            <label for="id">ID : </label>
            <input type="number" id="id" min="0" placeholder="student ID" required>
            <span class="validity"></span>
            <label for="firstname">Firstname : </label>
            <input type="text" id="firstname" placeholder="Firstname" required>
            <span class="validity"></span>
            <label for="lastname">Lastname : </label>
            <input type="text" id="lastname" placeholder="Lastname" required>
            <span class="validity"></span>
            <label for="email">Email : </label>
            <input type="email" id="email" placeholder="abc@abc.com" required>
            <span class="validity"></span>
            <label for="title">Title : </label>
            <input type="text" id="title" placeholder="title..." required>
            <span class="validity"></span>
            <label for="description">Description : </label>
            <input type="text" id="description" placeholder="Description" required>
            <span class="validity"></span>
            <label for="classOption">Classe : </label>
            <input type="text" id="classOption" placeholder="Classe..." required>
            <span class="validity"></span>
            <label for="classYear">Année : </label>
            <input type="number" min="2000" max="3000" id="classYear" placeholder="year" required>
            <span class="validity"></span>
            <label for="inSearch">Cherche poste :</label>
            <input type="checkbox" id="inSearch">
            <span class="validity"></span>
            <label for="currentCompany">Entreprise actuelle : </label>
            <input type="text" id="currentCompany" placeholder="Nom Entreprise..." required>
            <span class="validity"></span>
            <label for="currentCompany_linkedin">Linkedin entreprise : </label>
            <input type="text" id="currentCompany_linkedin" placeholder="Linkedin Entreprise...">
            <span class="validity"></span>
            <label for="location">Lieu : </label>
            <input type="text" id="location" placeholder="Lieu..." required>
            <span class="validity"></span>
            <label for="skills">Skill : </label>
            <input type="text" id="skills" placeholder="skill1,skill2,...">
            <span class="validity"></span>
            <label for="socialLinks">Socials : </label>
            <input type="text" id="socialLinks" placeholder="social1, social2,...">
            <span class="validity"></span>
        </form>
        <input type="submit" form="form1" id="submit_button" value="Ajouter Alumni">
    </section>
</body>

</html>