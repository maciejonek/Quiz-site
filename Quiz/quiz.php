<?php
    include '../Operations/classLoader.php';
    include '../Operations/dbFunctionsShortcut.php';
$connection = mysqli_connect('localhost','root','root','ProjektPHP');
if(isset($_POST['quizId'])) $_SESSION['quizId'] = $_POST['quizId'];

$query = "SELECT * FROM quizy WHERE id = '{$_SESSION['quizId']}'";
$result = mysqli_query($connection,$query);
$quiz = mysqli_fetch_array($result);

$query = "SELECT * FROM pytania WHERE id_quiz = '{$_SESSION['quizId']}'";
$result = mysqli_query($connection,$query);

function answerPrinter($answer, $number){
    if(!empty($answer)){
        echo '<div class="colorBorder answer">';
        echo '<input type="radio" name="answer""';
        echo 'id="';
        echo $number;
        echo '"';
        echo 'value="';
        echo $number;
        echo '" class="radio">';
        echo '<label for="'.$number.'">'.$answer.'</label><br>';
        echo '</div>';
    }
}
while($row[] = mysqli_fetch_array($result));
$_SESSION['numberOfQuestions'] = mysqli_num_rows($result);
if(empty($_SESSION['currentQuestion']) && empty($_SESSION['score'])) {
    $_SESSION['currentQuestion'] = 0;
    $_SESSION['score'] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Iso&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style1.css">
    <link rel="stylesheet" href="../CSS/border.css">
    <title>Quuiiiizzz</title>
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
            <?php
                if($_SESSION['currentQuestion'] == $_SESSION['numberOfQuestions']){
                    header('Location quizScore.php');
                }

                $i = $_SESSION['currentQuestion'];
                if($i == $_SESSION['numberOfQuestions']){
                    header('Location: quizScore.php');
                }
                echo '<div class="colorBorder">';
                echo '<h1>'.$quiz['nazwa'].'</h1>';
                echo '<h2>Punkty: '.$_SESSION['score'].'</h2>';
                echo '</div>';
                    if($row[$i]['typ_pytania']==1){
                        echo '<form action="quiz.php" method="post">';
                        echo '<div class="colorBorder">';
                        echo '<h3>'.$row[$i]['pytanie'].'</h3>';
                        echo '</div>';
                        answerPrinter($row[$i]['odp1'],1);
                        answerPrinter($row[$i]['odp2'],2);
                        answerPrinter($row[$i]['odp3'],3);
                        answerPrinter($row[$i]['odp4'],4);
                        echo '<div class="colorBorder">';
                        echo '<input type="submit" name="submit" value="Następne pytanie">';
                        echo '</form>';
                        echo '</div>';

                    }
                    elseif($row[$i]['typ_pytania']==2){
                        echo '<form action="quiz.php" method="post">';
                        echo '<div class="colorBorder">';
                        echo '<h3>'.$row[$i]['pytanie'].'</h3>';
                        echo '</div>';
                        echo '<div class="colorBorder">';
                        echo '<img src="../uploads/';
                        echo $row[$i]['obrazek'];
                        echo '" alt="" class="QuestionPicture">';
                        echo '</div>';
                        echo '<div class="colorBorder">';
                        echo '<input type="text" name="answer" class="TextInput" placeholder="Odpowiedź">';
                        echo '</div>';
                        echo '<div class="colorBorder">';
                        echo '<input type="submit" name="submit" value="Następne pytanie">';
                        echo '</form>';
                        echo '</div>';

                    }
                    
                    if(!empty($_POST['submit'])){
                        echo $_POST['answer'];
                        if(strtolower($_POST['answer']) == $row[$i]['poprawna_opd']) $_SESSION['score']++;
                        $_SESSION['currentQuestion']++;
                        header('Location: quiz.php');
                        exit();
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
