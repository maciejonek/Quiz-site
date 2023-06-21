<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style1.css">
    <title>Wynik</title>
</head>
<body>
        <div class="box">
        <div class="header">
            <!-- <h1>hjvhjvvhj</h1> -->
        </div>
        <div class="section">
            <?php
            include '../HTML/menu.html';
            ?>
            <div class="info">
                <?php
                session_start();
                echo '<h1> Twój końcowy wynik: '.$_SESSION['score'].'</h1>';
                if(isset($_SESSION['user'])) $user = $_SESSION['user'];
                session_destroy();
                if(isset($user)) $_SESSION['user'] = $user;
                ?>
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>
</body>
</html>
