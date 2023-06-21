<?php

$user = unserialize($_SESSION['user']);
echo '<a href="../User/Profile.php" id="ProfileLink">';
echo '<p id="ProfileName">'.$user->login.'</p>';
echo '<img src="../uploads/'.$user->picture.'" width="75" height="75">';
echo '</a>';
