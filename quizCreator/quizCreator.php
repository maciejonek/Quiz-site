<?php
    include '../Operations/classLoader.php';
    include '../Operations/dbFunctionsShortcut.php';

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
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Iso&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style1.css">
    <link rel="stylesheet" href="../CSS/border.css">
    <title>Kreator</title>
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

                <div class="info" style="width: 80%;">

                <button id="returnButton" onclick="history.go(-1);"><< </button>

                <form action="quizUpload.php">
                    <input type="submit" class="submit" value="Zapisz Quiz">
                </form>
                    
                <?php
                    echo '<br>';
                    echo "<p class='colorBorder' style='text-align: center;'>ilosc pytań: ".sizeof($_SESSION['questions'])."</p><br>";
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