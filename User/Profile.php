<?php
include '../Operations/classLoader.php';
include '../Operations/sessionClear.php';
include '../Operations/dbFunctionsShortcut.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Iso&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style1.css">
    <link rel="stylesheet" href="../CSS/border.css">
    <title>Profil</title>
</head>
<body>
<div class="box">
    <div class="header">
            <?php
                include '../User/headerProfile.php';
            ?>
    </div>
    <div class="section">
        <?php
        include '../HTML/menu.html';
        include '../Operations/checkLogin.php';
        ?>
        <div class="info">
            <?php
                $user = unserialize($_SESSION['user']);
                echo '<h1>'.$user->login.'</h1>';
                include 'operations/uploadPicture.php';
                include 'operations/getAchievements.php';
                include 'operations/xmlSave.php';
            ?>
            <h1></h1>
            <img src="../uploads/<?php echo $user->picture?>"  width="300" height="300">
            <form action="Profile.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" name="submit" value="Wgraj">
            </form>
            <h2>Punkty: <?php echo $score ?></h2>
            <h2>Rozwiązane quizy: <?php echo resultRows($query)?></h2>
            <p><a href="operations/download.php?file=achievements.xml"><button type="button">Pobierz wyniki</button></a></p>

            <?php
                
            ?>
        </div>
    </div>
    <div class="footer">
        <?php
            if(!empty($status)) echo '<h2>'.$status.'</h2>';
        ?>
    </div>
</div>
</body>
</html>
