<?php
include "../Operations/classLoader.php";
$connection = mysqli_connect('localhost','root','root','ProjektPHP');
if(isset($_POST['quizId'])) $_SESSION['quizId'] = $_POST['quizId'];

$query = "SELECT * FROM quizy WHERE id = '{$_SESSION['quizId']}'";
$result = mysqli_query($connection,$query);
$quiz = mysqli_fetch_array($result);

$query = "SELECT * FROM pytania WHERE id_quiz = '{$_SESSION['quizId']}'";
$result = mysqli_query($connection,$query);

function answerPrinter($answer, $number){
    if(!empty($answer)){
        echo '<input type="radio" name="answer" id=""';
        echo 'value="';
        echo $number;
        echo '">';
        echo $answer.'<br>';
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
    <title>Quuiiiizzz</title>
</head>
<body>
    <?php
    include '../HTML/menu.html';
    ?>

    <?php
        echo $_SESSION['numberOfQuestions'];
        echo $_SESSION['currentQuestion'];
        if($_SESSION['currentQuestion'] == $_SESSION['numberOfQuestions']){
            header('Location quizScore.php');
        }
        $i = $_SESSION['currentQuestion'];
        if($i == $_SESSION['numberOfQuestions']){
            header('Location: quizScore.php');
        }
        echo '<h1>'.$quiz['nazwa'].'</h1>';
        echo '<h2>Punkty: '.$_SESSION['score'].'</h2>';
            if($row[$i]['typ_pytania']==1){
                echo '<form action="quiz.php" method="post">';
                echo '<h3>'.$row[$i]['pytanie'].'</h3>';
                answerPrinter($row[$i]['odp1'],1);
                answerPrinter($row[$i]['odp2'],2);
                answerPrinter($row[$i]['odp3'],3);
                answerPrinter($row[$i]['odp4'],4);
                echo '<input type="submit" name="submit" value="Następne pytanie">';
                echo '</form>';

            }
            elseif($row[$i]['typ_pytania']==2){
                echo '<form action="quiz.php" method="post">';
                echo '<h3>'.$row[$i]['pytanie'].'</h3>';
                echo '<img src="../uploads/';
                echo $row[$i]['obrazek'];
                echo '" alt="" width="500" height="400"><br>';
                echo '<input type="text" name="answer" placeholder="Odpowiedź">';
                echo '<input type="submit" name="submit" value="Następne pytanie">';
                echo '</form>';

            }
            if(!empty($_POST['submit'])){
                echo $_POST['answer'];
                if(strtolower($_POST['answer']) == $row[$i]['poprawna_opd']) $_SESSION['score']++;
                $_SESSION['currentQuestion']++;
                header('Location: quiz.php');
                exit();
            }
    ?>

</body>
</html>
