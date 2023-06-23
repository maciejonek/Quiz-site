<?php
    include '../Operations/classLoader.php';
    include '../Operations/dbFunctionsShortcut.php';

    if(empty($_SESSION['questions'])){
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

                <div class="info infoCreator">
                    <div id="Creator">

                        <button id="returnButton" onclick="history.go(-1);"><< </button>

                        <form action="quizUpload.php">
                            <input type="submit" class="submit" value="Zapisz Quiz">
                        </form>

                        <?php
                            echo '<br>';
                            echo "<p class='colorBorder' style='text-align: center;'>Ilość pytań ".sizeof($_SESSION['questions'])."</p><br>";
                            echo '<table class="formsTable"><tr><td>';
                            include "../quizCreator/radioQuiz/radioQuiz.php";
                            include "../quizCreator/imageQuiz/imageUpload.php";
                            include "../quizCreator/radioQuiz/radioQuizForm.html";
                            echo '</td><td>';
                            include "../quizCreator/imageQuiz/imageQuizForm.html";
                            echo '</td></tr></table>';

                        ?>
                    </div>
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>
</body>
</html>