<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynik</title>
</head>
<body>
    <?php
    include '../HTML/menu.html';
    ?>
    <?php
    session_start();
    echo '<h1> Twój końcowy wynik: '.$_SESSION['score'].'</h1>';
    if(isset($_SESSION['user'])) $user = $_SESSION['user'];
    session_destroy();
    if(isset($user)) $_SESSION['user'] = $user;
    ?>
</body>
</html>
