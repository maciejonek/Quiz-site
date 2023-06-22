<?php
    if(empty($_SESSION['user'])){
        $user = new \Classes\User(2,'Niezalogowano','',4,'unknown.png');
        $_SESSION['user'] = serialize($user);
    }

    $user = unserialize($_SESSION['user']);
    echo '<a href="../User/Profile.php" id="ProfileLink">';
    echo '<p id="ProfileName">' . $user->login . '</p>';
    echo '<p id="SiteName">KŁIZZY</p>';
    echo '<img src="../uploads/' . $user->picture . '" id="ProfilePicture">';
    echo '</a>';
    if($user->role == 1 || $user->role ==2){
        echo '<a href="../controlPanel/controlPanel.php"><button type="button">Control Panel</button></a>';
    }
