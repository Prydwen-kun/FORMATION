<?php
// $beers = [
//     [
//         'name' => 'Chouffe',
//         'img' => '',
//         'description' => 'Dev web en formation',
//         'ingredients' => 'houblon, eau, orge',
//         'site' => 'peterlegendre.com',
//         'socials' => 'https://www.linkedin.com/in/peter-legendre/',
//     ],

// ];

$beers = [
    [
        'name' => 'Chouffe',
        'img' => 'https://chouffe.com/app/uploads/2018/08/01-2-300x0-c-default.jpg',
        'description' => 'Biere debug 1',
        'ingredients' => ['houblon', 'eau', 'orge'],
        'site' => 'peterlegendre.com',
        'socials' => [
            'facebook' => 'facebookDebug.com',
            'instagram' => 'debug',
            'twitter' => ''
        ],
    ],
    [
        'name' => 'Heinebug',
        'img' => 'https://www.heineken.com/media-eu/01pfxdqq/heineken-original-bottle.png?anchor=center&mode=crop&width=712&height=1068&quality=85',
        'description' => 'Biere debug 2',
        'ingredients' => ['houblon', 'eau', 'cocainum'],
        'site' => 'peterlegendre.com',
        'socials' => [
            'facebook' => 'facebookDebug.com',
            'instagram' => 'debug',
            'twitter' => 'HeineTwitter.com'
        ],
    ],
    [
        'name' => '1996',
        'img' => 'https://www.heineken.com/media-eu/01pfxdqq/heineken-original-bottle.png?anchor=center&mode=crop&width=712&height=1068&quality=85',
        'description' => 'Biere debug 3',
        'ingredients' => ['houblon', 'eau', 'cocainum'],
        'site' => 'peterlegendre.com',
        'socials' => [
            'facebook' => 'facebookDebug.com',
            'instagram' => 'debug',
            'twitter' => ''
        ],
    ],
    [
        'name' => 'Biere du default',
        'img' => 'https://www.heineken.com/media-eu/01pfxdqq/heineken-original-bottle.png?anchor=center&mode=crop&width=712&height=1068&quality=85',
        'description' => 'Biere debug 4',
        'ingredients' => ['houblon', 'eau', 'cocainum'],
        'site' => 'peterlegendre.com',
        'socials' => [
            'facebook' => 'facebookDebug.com',
            'instagram' => 'debug',
            'twitter' => 'HeineTwitter.com'
        ],
    ]

];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beer Liste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <section class="my-5">
        <div class="container">
            <h1 class="my-5">BIERE</h1>
            <div class="row gap-5">

                <?php foreach ($beers as $beer) : ?>
                    <div class="card col">
                        <img src="<?= $beer['img'] ?>" class="card-img-top" style="height: 200px;object-fit :scale-down;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $beer['name'] ?></h5>
                            <p class="card-text"><?= $beer['description'] ?></p>
                            <?php foreach ($beer['ingredients'] as $ingredient) : ?>
                                <p class="card-text"><?= $ingredient ?></p>
                            <?php endforeach; ?>
                            <a href="<?= $beer['site'] ?>" class="btn btn-secondary">Site</a>
                            <?php foreach ($beer['socials'] as $social) : ?>
                                <?php if ($social != '') : ?>
                                    <a href="<?= $social ?>" class="btn btn-primary">Social <?= $social ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>