<?php
    include '..'.DIRECTORY_SEPARATOR.'Classes'.DIRECTORY_SEPARATOR.'User.php';
    session_start();
    function checkVarLogin(){
        return isset($_POST['login']) && isset($_POST['password']);
    }
    function checkVarRegister(){
        return isset($_POST['loginRegister']) && isset($_POST['passwordRegister']) && isset($_POST['passwordRepeat']);
    }
    function connection(){
        return mysqli_connect('localhost','root','root','ProjektPHP');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style2.css">
    <title>Login</title>
</head>
<body>
    <div class="menu">
        <span id=""><a href="../index.php">Strona główna</a></span>
        <span id="QuizOfTheDay">Quiz dnia</span>
        <span id="Arcade">Arcade</span>
        <span><a href="../quizCreator/quizCategory.php">Kreator Quiz'ów</a></span>
        <span id="login"><a href="loginPage.php">Logowanie</a></span>
    </div>
    <?php
    if(!isset($_SESSION['user'])) include '..'.DIRECTORY_SEPARATOR.'HTML' . DIRECTORY_SEPARATOR . 'loginForms.html';
    else{
        header('Location: logoutPage.php');
        die();
    }
        if(checkVarLogin()){
            $query = "SELECT * FROM users WHERE login='{$_POST['login']}' AND haslo='{$_POST['password']}';";
            $connection = mysqli_connect('localhost','root','root','ProjektPHP');
            $result = mysqli_query(connection(),$query);
            if(mysqli_num_rows($result)!=0){
                $row = mysqli_fetch_array($result);
                $user = new \Classes\User($row['id'],$row['login'],$row['password'],$row['id_rola']);
                $_SESSION['user'] = serialize($user);
                header('Location: logoutPage.php');
                die();
            }
            echo "Błędna nazwa użytkownika lub hasło";
        }
        if(checkVarRegister()){
            if($_POST['passwordRegister'] == $_POST['passwordRepeat']){
                $query = "SELECT * FROM users WHERE login='{$_POST['loginRegister']}';";
                $result =  mysqli_query(connection(),$query);
                if(mysqli_num_rows($result)==0){

                    $query = "INSERT INTO users(login,haslo,id_rola) VALUES ('{$_POST['loginRegister']}','{$_POST['passwordRegister']}',3);";
                    mysqli_query(connection(),$query);

                    $query = "SELECT * FROM users WHERE login='{$_POST['loginRegister']}' AND haslo='{$_POST['loginRegister']}';";
                    $result = mysqli_query(connection(),$query);
                    $row = mysqli_fetch_array($result);
                    $user = new \Classes\User($row['id'],$row['login'],$row['password'],$row['id_rola']);
                    $_SESSION['user'] = serialize($user);
                    header('Location: logoutPage.php');
                    die();
                }
                else echo "Nazwa użytkownika zajęta";
            }
            else echo "Hasła nie zgadzają się";
        }

    ?>
</body>
</html>