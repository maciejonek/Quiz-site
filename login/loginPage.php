<?php

    include '../Operations/classLoader.php';
    include '../Operations/dbFunctionsShortcut.php';

    function checkVarLogin(){
        return isset($_POST['login']) && isset($_POST['password']);
    }
    function checkVarRegister(){
        return isset($_POST['loginRegister']) && isset($_POST['passwordRegister']) && isset($_POST['passwordRepeat']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style1.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Iso&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <?php
    include '../HTML/menu.html';
    ?>
    <?php
    if(!isset($_SESSION['user'])) include 'loginForms.html';
    else{
        $user = unserialize($_SESSION['user']);
        if ($user->role == 4) include 'loginForms.html';
        else {
            header('Location: logoutPage.php');
            die();
        }
    }
        if(checkVarLogin()){
            $query = "SELECT * FROM users WHERE login='{$_POST['login']}' AND haslo='{$_POST['password']}';";
            $result = mysqli_query(connection(),$query);
            if(mysqli_num_rows($result)!=0){
                $row = mysqli_fetch_array($result);
                $user = new \Classes\User($row['id'],$row['login'],$row['password'],$row['id_rola'],$row['obrazek']);
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
                    $query = "SELECT * FROM users WHERE login='{$_POST['loginRegister']}' AND haslo='{$_POST['passwordRegister']}';";
                    $result = mysqli_query(connection(),$query);
                    $row = mysqli_fetch_array($result);
                    $user = new \Classes\User($row['id'],$row['login'],$row['password'],$row['id_rola'],$row['obrazek']);
                    $_SESSION['user'] = serialize($user);
                    header('Location: logoutPage.php');
                }
                else echo "Nazwa użytkownika zajęta";
            }
            else echo "Hasła nie zgadzają się";
        }

    ?>
</body>
</html>