<?php
$users = [
    [
        'name' => 'Legendre',
        'firstname' => 'Peter',
        'avatar'=> 'https://media.licdn.com/dms/image/D5635AQF5Dtw2oYT6fA/profile-framedphoto-shrink_800_800/0/1713965340249?e=1718704800&v=beta&t=nP-M-KxcHvZ00b1OBmiW2YWdXTSdt-Eg51P70r6-szU',
        'bio' => 'Dev web en formation',
        'portfolio' => 'peterlegendre.com',
        'linkedin' => 'https://www.linkedin.com/in/peter-legendre/'
    ],
    [
        'name' => 'Roche',
        'firstname' => 'Ken',
        'avatar'=> 'https://media.licdn.com/dms/image/D4E35AQHW2XNu-kw9mg/profile-framedphoto-shrink_800_800/0/1717530243370?e=1718704800&v=beta&t=Nna4oHuFoIrAm1lGa_ens--JSdeQZqnZ9l5LUHg2Gxk',
        'bio' => 'Dev web en formation',
        'portfolio' => 'kenroche.com',
        'linkedin' => 'https://www.linkedin.com/in/ken-roche/'
    ],
    [
        'name' => 'Rouvière',
        'firstname' => 'Emmeline',
        'avatar'=> 'https://media.licdn.com/dms/image/D4E35AQEBS8dSK1oTpA/profile-framedphoto-shrink_800_800/0/1713503699519?e=1718704800&v=beta&t=RO1P8SqtJCPdTbzqjwyMx3rR7HrYqugrurnqxyoF0hM',
        'bio' => 'Dev web en formation',
        'portfolio' => 'emmelinerouviere.com',
        'linkedin' => 'https://www.linkedin.com/in/emmeline-rouviere/'
    ],
    [
        'name' => 'Trullu',
        'firstname' => 'Sébastien',
        'avatar'=> 'https://media.licdn.com/dms/image/D4D35AQGPRWf3QyrOBA/profile-framedphoto-shrink_800_800/0/1716379836776?e=1718704800&v=beta&t=sO_XkMdTYyBZH0aXiymAFhyf9M2tcaKJQg9bgY3xoS8',
        'bio' => 'Dev web en formation',
        'portfolio' => 'sebastientrullu.com',
        'linkedin' => 'https://www.linkedin.com/in/s%C3%A9bastien-trullu/'
    ]
];


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alumnis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section class="my-5">
        <div class="container">
            <h1 class="my-5">L'équipe de chocapic!</h1>
            <div class="row gap-5">
                <!-- <div class="card col">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        <a href="#" class="btn btn-secondary">Go somewhere</a>
                    </div>
                </div> -->
                <?php foreach ($users as $user) : ?>
                    <div class="card col">
                        <img src="<?= $user['avatar']?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $user['firstname'].''.$user['name']?></h5>
                            <p class="card-text"><?= $user['bio']?></p>
                            <a href="<?= $user['linkedin']?>" class="btn btn-primary">Linkedin</a>
                            <a href="<?= $user['portfolio']?>" class="btn btn-secondary">Portfolio</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>