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
    <title>Dodano!</title>
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
                <div>
                    <p>Twój quiz został dodany!</p>
                    <form action="../index/index.php" method="post">
                        <input type="submit" value="Wróć na stronę główną">
                    </form>
                </div>
                <?php
                    include 'uploadFunction.php';
                ?>
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>
</body>
</html>
