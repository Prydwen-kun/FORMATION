<?php
function listUsers($users, $start, $length)
{
  foreach ($users as $user) {
    foreach ($user as $key => $value) {
      echo '<th>' . $key . '</th>';
    }
    break;
  }
  echo '<th>Voir Profil</th>';

  $users_slice = array_slice($users, $start, $length);

  foreach ($users_slice as $user) {
    echo '<tr>';
    foreach ($user as $key => $value) {
      echo '<td>';
      echo $value;
      echo '</td>';
    }
    echo '<td><a href="userProfil.php?userId=' . $user['id'] . '">Profil</a></td>';
    echo '</tr>';
  }
}
