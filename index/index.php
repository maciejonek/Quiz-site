<?php
    include '../Operations/classLoader.php';
    include '../Operations/sessionClear.php';
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
<!--    <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">-->
<!--    <link href="https://fonts.googleapis.com/css?family=Archivo:700&display=swap" rel="stylesheet">-->
    <title>Strona główna</title>
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
                <!-- <p>tyyuuii</p>
                <p>tyyuuii</p>
                <p>tyyuuii</p>
                <p>tyyuuii</p>
                <p>tyyuuii</p> -->
            </div>
        </div>
        <div class="footer">

        </div>
    </div>
</body>
</html>
