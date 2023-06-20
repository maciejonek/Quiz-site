<?php
    include 'Classes'.DIRECTORY_SEPARATOR.'User.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style1.css">
    <title>Main page</title>
</head>
<body>
    <div class="box">
        <div class="header">
            <!-- <h1>hjvhjvvhj</h1> -->
        </div>
        <div class="section">
            <div class="menu">
                <span id=""><a href="index.php">Strona główna</a></span>
                <span id="QuizOfTheDay">Quiz dnia</span>
                <span id="Arcade">Arcade</span>
                <span><a href="quizCreator/quizCategory.php">Kreator Quiz'ów</a></span>
                <span id="login"><a href="login/loginPage.php">Logowanie</a></span>
            </div>
            <div class="info">
                <!-- <p>tyyuuii</p>
                <p>tyyuuii</p>
                <p>tyyuuii</p>
                <p>tyyuuii</p>
                <p>tyyuuii</p> -->
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>
</body>
</html>
