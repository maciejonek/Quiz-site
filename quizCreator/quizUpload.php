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
    <title>Dodano!</title>
</head>
<body>
    <?php
    include '../HTML/menu.html';
    ?>
    <div>
        <p>Twój quiz został dodany!</p>
        <form action="../index/index.php" method="post">
            <input type="submit" value="Wróć na stronę główną">
        </form>
    </div>
    <?php

        $connection = mysqli_connect('localhost','root','root','ProjektPHP');
        if( isset($_SESSION['quizName']) && isset($_SESSION['quizCategory']) && isset($_SESSION['questions'])){
            if(isset($_SESSION['user'])) {
                $user = unserialize($_SESSION['user']);
                $objects = array();
                $query = "INSERT INTO quizy(nazwa, kategoria, user_id) VALUES ('{$_SESSION['quizName']}','{$_SESSION['quizCategory']}','{$user->getId()}');";
            }
            else
                $query = "INSERT INTO quizy(nazwa, kategoria) VALUES ('{$_SESSION['quizName']}','{$_SESSION['quizCategory']}');";
            mysqli_query($connection,$query);

            $query = "SELECT * FROM quizy;";
            $result = mysqli_query($connection, $query);
            $quizID = mysqli_num_rows($result);

            foreach ($_SESSION['questions'] as $question){
                $objects[] = unserialize($question);
            }
            foreach ($objects as $object){
                if($object->questionType == 1)
                    $query = "INSERT INTO pytania (pytanie,odp1,odp2,odp3,odp4,poprawna_opd,typ_pytania,id_quiz) VALUES ('{$object->question}','{$object->answer1}','{$object->answer2}','{$object->answer3}','{$object->answer4}','{$object->correctAnswer}','{$object->questionType}','{$quizID}');";
                elseif($object->questionType == 2)
                    $query = "INSERT INTO pytania(pytanie, obrazek, poprawna_opd, typ_pytania, id_quiz) VALUES ('{$object->question}','{$object->image}','{$object->correctAnswer}','{$object->questionType}','{$quizID}')";
                mysqli_query($connection,$query);
            }
            unset($_SESSION['questions'],$_SESSION['quizName'],$_SESSION['quizCategory']);
        }

    ?>
    
</body>
</html>
