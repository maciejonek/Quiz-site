<?php
include "../Classes/radioQuiz.php";
include "../Classes/imageQuiz.php";
session_start();

    if(!isset($_SESSION['questions'])){
        $_SESSION['questions'] = array();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style1.css">
    <title>Kreator</title>
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
                <form action="quizUpload.php">
                    <input type="submit" value="Zapisz Quiz">
                </form>
                    
                <?php
                    echo "ilosc pytań: ".sizeof($_SESSION['questions']);
                    include "../quizCreator/radioQuiz/radioQuizForm.html";
                    include "../quizCreator/imageQuiz/imageQuizForm.html";
                    include "../quizCreator/radioQuiz/radioQuiz.php";
                    include "../quizCreator/imageQuiz/imageUpload.php";

                ?>
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>
</body>
</html>