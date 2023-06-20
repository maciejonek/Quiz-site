<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="menu">
        <span id=""><a href="../index.php">Strona główna</a></span>
        <span id="QuizOfTheDay">Quiz dnia</span>
        <span id="Arcade">Arcade</span>
        <span><a href="../quizCreator/quizCategory.php">Kreator Quiz'ów</a></span>
        <span id="login"><a href="loginPage.php">Logowanie</a></span>
    </div>
    <form action="logoutPage.php" method="post">
        <input type="submit" name="logout" value="Wyloguj">
    </form>
    <?php
        session_start();
        if(isset($_POST['logout'])){
            session_destroy();
            header('Location: loginPage.php');
            die();
        }
        var_dump($_SESSION['user']);
    ?>
</body>
</html>
