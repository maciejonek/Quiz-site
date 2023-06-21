<?php
    include '../Operations/classLoader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style1.css">
    <title>Main page</title>
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
                <!-- <p>tyyuuii</p>
                <p>tyyuuii</p>
                <p>tyyuuii</p>
                <p>tyyuuii</p>
                <p>tyyuuii</p> -->
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>
</body>
</html>
