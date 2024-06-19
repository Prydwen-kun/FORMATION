<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni exo 14</title>
    <link rel="stylesheet" href="style.css">
    <?php
    require 'function.php';
    ?>
</head>

<body>
    <?php
    $alumnuses = [
        [
            'id' => 1,
            'firstname' => 'debugName',
            'lastname' => 'debugLastName',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'Web',
            'classYear' => 'debugYear',
            'inSearch' => true,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'Montpellier',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
        [
            'id' => 2,
            'firstname' => 'debugName2',
            'lastname' => 'debugLastName2',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'Web',
            'classYear' => 'debugYear',
            'inSearch' => true,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'Ah Ah',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
        [
            'id' => 3,
            'firstname' => 'debugName3',
            'lastname' => 'debugLastName3',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'Web',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'Tsutsu',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
        [
            'id' => 4,
            'firstname' => 'debugName4',
            'lastname' => 'debugLastName4',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'Starbuck',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'ty-7863',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
        [
            'id' => 5,
            'firstname' => 'debugName5',
            'lastname' => 'debugLastName5',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'Starbuck',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'gh-7542',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
        [
            'id' => 6,
            'firstname' => 'debugName6',
            'lastname' => 'debugLastName6',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'Design',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'gr-5623',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
        [
            'id' => 7,
            'firstname' => 'debugName7',
            'lastname' => 'debugLastName7',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'Design',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'df-789',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
        [
            'id' => 8,
            'firstname' => 'debugName8',
            'lastname' => 'debugLastName8',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'Design',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'SB-4589',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
        [
            'id' => 9,
            'firstname' => 'debugName9',
            'lastname' => 'debugLastName9',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'Starbuck',
            'classYear' => 'debugYear',
            'inSearch' => true,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'ty-78756',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
        [
            'id' => 10,
            'firstname' => 'debugName10',
            'lastname' => 'debugLastName10',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'Design',
            'classYear' => 'debugYear',
            'inSearch' => true,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'fr-48665',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
    ];
    ?>
    <header>
        <nav class="main_nav">
            <a href="index.php">Home</a>
            <a href="index.php">Liste Alumni</a>
            <a href="index.php">Statistiques</a>
            <a href="ajoutAlumni.php">Ajout Alumni</a>
        </nav>
    </header>
    <section class="container">
        <table>
            <tbody>
                <?php
                $percentage = 0;
                $nbEnPoste = 0;
                $specialityMap = [];
                foreach ($alumnuses as $alumni) {
                    foreach ($alumni as $key => $value) {
                        echo '<th>' . $key . '</th>';
                    }
                    break;
                }

                ?>

                <?php foreach ($alumnuses as $alumni) : ?>
                    <tr>
                        <?php foreach ($alumni as $key => $stat) : ?>

                            <td>

                                <?php
                                if (!is_array($stat)) {
                                    if ($key == 'classOption') {
                                        specialityCountMap($stat, $specialityMap);
                                        echo '<p>' . $stat . '</p>';
                                    } elseif ($key == 'inSearch') {
                                        if ($stat) {
                                            echo '<p>Searching</p>';
                                        } else {
                                            echo '<p>Not searching</p>';
                                            $nbEnPoste++;
                                        }
                                    } else {
                                        echo '<p>' . $stat . '</p>';
                                    }
                                } else {
                                    echo '<ul>';
                                    foreach ($stat as $value) {
                                        echo '<li><p>' . $value . '</p></li>';
                                    }
                                    echo '</ul>';
                                }
                                ?>

                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section class="stats">
        <p>
            <?php
            echo 'Nombre d\'alumni en poste : ' . (($nbEnPoste / count($alumnuses)) * 100) . ' % ';
            ?>
        </p>
        <?php

        foreach ($specialityMap as $key => $value) {

            echo '<p>' . $key . ' : ' . $value . '</p>';
        }
        ?>
    </section>
    <section class="class_stats">
        <?php
        EmployedPerSpe($alumnuses);
        ?>
    </section>
</body>

</html>