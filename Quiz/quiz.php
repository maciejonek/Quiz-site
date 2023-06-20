<?php
include "../Operations/classLoader.php";
$connection = mysqli_connect('localhost','root','root','ProjektPHP');

$query = "SELECT * FROM quizy WHERE id = '{$_POST['quizId']}'";
$result = mysqli_query($connection,$query);
$quiz = mysqli_fetch_array($result);

$query = "SELECT * FROM pytania WHERE id_quiz = '{$_POST['quizId']}'";
$result = mysqli_query($connection,$query);

function answerPrinter($answer,$number,$correct){
    if(!empty($answer)){
        echo '<input type="radio" name="answer" id=""';
        echo 'value="';
        if($correct==$number)
            echo 'correct';
        echo '">';
        echo $answer.'<br>';
    }
}
while($row[] = mysqli_fetch_array($result));
$_SESSION['numberOfQuestions'] = mysqli_num_rows($result);
$_SESSION['currentQuestion'] = 2;
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
        $i = $_SESSION['currentQuestion'];
        echo '<h1>'.$quiz['nazwa'].'</h1>';

            if($row[$i]['typ_pytania']==1){
                echo '<form action="" method="post">';
                echo '<h3>'.$row[$i]['pytanie'].'</h3>';
                answerPrinter($row[$i]['odp1'],1,$row[$i]['poprawna_opd']);
                answerPrinter($row[$i]['odp2'],2,$row[$i]['poprawna_opd']);
                answerPrinter($row[$i]['odp3'],3,$row[$i]['poprawna_opd']);
                answerPrinter($row[$i]['odp4'],4,$row[$i]['poprawna_opd']);
                echo '</form>';
                echo '<input type="submit" value="Następne pytanie"';
            }
            elseif($row[$i]['typ_pytania']==2){
                echo '<form action="" method="post">';
                echo '<h3>'.$row[$i]['pytanie'].'</h3>';
                echo '<img src="../uploads/';
                echo $row[$i]['obrazek'];
                echo '" alt="" width="500" height="400"><br>';
                echo '<input type="text" name="answer" placeholder="Odpowiedź">';
                echo '</form>';
                echo '<input type="submit" value="Następne pytanie"';
            }
    ?>

</body>
</html>
