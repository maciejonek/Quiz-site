<?php
    include '../Operations/classLoader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
<div class="box">
    <div class="header">
    </div>
    <div class="section">
        <?php
        include '../HTML/menu.html';
        ?>
        <div class="info">
            <?php
                $user = unserialize($_SESSION['user']);
                echo '<h1>'.$user->login.'</h1>';
                echo $user->picture;
            ?>
            <h1></h1>
            <img src="../uploads/<?php echo $user->picture?>"  width="300" height="300">
            <form action="Profile.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" name="submit" value="Wgraj">
            </form>
            <?php
                include 'uploadPicture.php';
            ?>
        </div>
    </div>
    <div class="footer">
        <!-- <p>123</p> -->
    </div>
</div>
</body>
</html>
