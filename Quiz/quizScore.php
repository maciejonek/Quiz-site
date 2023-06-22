<?php
include '../Operations/classLoader.php';
include '../Operations/dbFunctionsShortcut.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Iso&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style1.css">
    <link rel="stylesheet" href="../CSS/border.css">
    <title>Wynik</title>
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
                <div class="borderSmall">
                <?php
                if(!isset($_SESSION['score']) || !isset($_SESSION['numberOfQuestions']) || !isset($_SESSION['quizId'])){
                    header('Location: ../index/index.php');
                    exit();
                }
                echo '<h1> Twój końcowy wynik: '.$_SESSION['score'].'/'.$_SESSION['numberOfQuestions'].'</h1>';
                if(isset($_SESSION['user'])){
                    $user = unserialize($_SESSION['user']);
                    if($user->role != 4){
                        $query1 = "SELECT * FROM assocUsersQuizy WHERE id_user = '{$user->id}' AND id_quiz = '{$_SESSION['quizId']}'";
                        $rows = resultRows($query1);
                        if($rows == 0) {
                            $query2 = "INSERT INTO assocUsersQuizy (id_user,id_quiz,punkty) VALUES ({$user->id},{$_SESSION['quizId']},{$_SESSION['score']})";
                            executeQuery($query2);
                        }
                        else{
                            $resultArray = fetchArray($query1);
                            if($resultArray['punkty']<$_SESSION['score']){
                                $query2 = "UPDATE assocUsersQuizy SET punkty='{$_SESSION['score']}' WHERE id_user = '{$user->id}' AND id_quiz = '{$_SESSION['quizId']}'";
                                executeQuery($query2);
                            }
                        }
                        $resultArray = fetchArray($query1);
                        echo '<h1> Twój najlepszy wynik: '.$resultArray['punkty'].'</h1>';
                    }
                }
                session_destroy();
                session_start();
                if(isset($user)) $_SESSION['user'] = serialize($user);
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
