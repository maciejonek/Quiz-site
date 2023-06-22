<?php

include '../Operations/classLoader.php';
include '../Operations/dbFunctionsShortcut.php';

$connection = mysqli_connect('localhost','root','root','ProjektPHP');
$query = "SELECT * FROM kategorie";
$result = mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Iso&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style1.css">
    <link rel="stylesheet" href="../CSS/border.css">
    <title>Kategorie</title>
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
                <ul>
                    <?php
                    while($row = mysqli_fetch_array($result)){
                        echo '<form action="quizList.php" method="get">';
                        echo '<li><input type="hidden" name="category" value="'.$row['nazwa'].'">';
                        echo '<input type="submit" class="submit" value="'.$row['nazwa'].'">'.'</li>';
                        echo '</form>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>
</body>
</html>
