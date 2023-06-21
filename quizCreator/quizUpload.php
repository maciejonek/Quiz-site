<?php
include "../Classes/radioQuiz.php";
include "../Classes/imageQuiz.php";
include "../Classes/User.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style1.css">
    <title>Dodano!</title>
</head>
<body>
    <div class="box">
        <div class="header">
            <!-- <h1>hjvhjvvhj</h1> -->
        </div>
        <div class="section">
            <?php
            include '../HTML/menu.html';
            ?>
            <div class="info">
                <div>
                    <p>Twój quiz został dodany!</p>
                    <form action="../index/index.php" method="post">
                        <input type="submit" value="Wróć na stronę główną">
                    </form>
                </div>
                <?php
                    include 'uploadFunction.php';
                ?>
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>
</body>
</html>
