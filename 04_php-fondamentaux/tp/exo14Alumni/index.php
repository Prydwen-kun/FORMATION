<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni exo 14</title>
    <link rel="stylesheet" href="style.css">
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
            'classOption' => 'debugOption',
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
            'classOption' => 'debugOption',
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
            'id' => 3,
            'firstname' => 'debugName3',
            'lastname' => 'debugLastName3',
            'email' => 'debug@debug.com',
            'title' => 'debugTitle',
            'description' => 'debugDescription',
            'classOption' => 'debugOption',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'Montpellier',
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
            'classOption' => 'debugOption',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'Montpellier',
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
            'classOption' => 'debugOption',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'Montpellier',
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
            'classOption' => 'debugOption',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'Montpellier',
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
            'classOption' => 'debugOption',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'Montpellier',
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
            'classOption' => 'debugOption',
            'classYear' => 'debugYear',
            'inSearch' => false,
            'currentCompany' => [
                'name' => 'debugCompany',
                'linkedin' => 'debugLinkedin.com',
            ],
            'location' => 'Montpellier',
            'skills' => ['debugSkill1', 'debugSkill2'],
            'socialLinks' => ['debugFacebook', 'debugTwitter']
        ],
    ];
    ?>
    <header>
        <nav>
            <a href="#">Home</a>
            <a href="#">Liste Alumni</a>
            <a href="#">Statistiques</a>
        </nav>
    </header>
    <section class="container">
        <table>
            <tbody>
                <?php
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
                                    if ($key == 'inSearch') {
                                        if ($stat) {
                                            echo '<p>Searching</p>';
                                        } else {
                                            echo '<p>Not searching</p>';
                                        }
                                    } else
                                        echo '<p>' . $stat . '</p>';
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
</body>

</html>