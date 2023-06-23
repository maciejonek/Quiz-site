<?php
include '../Operations/classLoader.php';
include '../Operations/dbFunctionsShortcut.php';
error_reporting(E_ALL ^ E_WARNING);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Iso&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style1.css">
    <link rel="stylesheet" href="../CSS/border.css">
    <title>Control Panel</title>
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
        $access = 1;
        if(!empty($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
            if($user->role != 1 && $user->role != 2) $access = 0;
        }
        else $access = 0;
        ?>
        <div class="info">
            <form action="controlPanel.php" method="post">
                <input type="submit" name="option" value="Kategorie">
                <input type="submit" name="option" value="Quizy">
            </form>
            <br>

            <?php
            if($access) {
                if (isset($_POST['option'])) {
                    $_SESSION['option'] = $_POST['option'];
                }
                $connection = mysqli_connect('localhost', 'root', 'root', 'ProjektPHP');
                if (isset($_SESSION['option'])) {
                    if ($_SESSION['option'] == 'Kategorie' && $user->role == 1)
                        include 'categories.php';
                    elseif ($_SESSION['option'] == 'Quizy')
                        include 'collection.php';
                    elseif ($_SESSION['option'] == 'Kategorie' && $user->role == 2)
                        echo '<h2>Dostępne tylko dla adminów</h2>';
                }
            }
            else echo '<h1>Błąd logowania</h1>'
            ?>
        </div>
    </div>
    <div class="footer">

    </div>
</div>
</body>
</html>
