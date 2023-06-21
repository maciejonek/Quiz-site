<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include '../HTML/menu.html';
    ?>
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
