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
    <title>Kreator</title>
</head>
<body>
    <form action="quizUpload.php">
        <input type="submit" value="Zapisz Quiz">
    </form>
    <?php
        echo "ilosc pytań: ".sizeof($_SESSION['questions']);
        include "../quizCreator/radioQuiz/radioQuizForm.html";
        include "../quizCreator/imageQuiz/imageQuizForm.html";
        include "../quizCreator/radioQuiz/radioQuiz.php";
        include "../quizCreator/imageQuiz/imageUpload.php";
        var_dump($_SESSION['questions']);

    ?>

</body>
</html>