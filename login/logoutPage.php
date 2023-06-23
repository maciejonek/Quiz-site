<?php
include '../Operations/classLoader.php';
include '../Operations/dbFunctionsShortcut.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Iso&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style1.css">
    <link rel="stylesheet" href="../CSS/border.css">
    <title>Logout</title>
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
            ?>
            <div class="info">
                <form action="logoutPage.php" method="post">
                    <input type="submit" name="logout" value="Wyloguj" class="colorBorder changeBackground" style="margin-top: 150px;">
                </form>
                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('Location: loginPage.php');
                    die();
                }
                ?>
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>
</body>
</html>
