<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style1.css">
    <title>Document</title>
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
                ?>
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>
</body>
</html>
