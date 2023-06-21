<?php
$connection = mysqli_connect('localhost','root','root','ProjektPHP');
$query = "SELECT * FROM kategorie";
$result = mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategorie</title>
</head>
<body>
    <?php
    include '../HTML/menu.html';
    ?>
        <ul>
            <?php
            while($row = mysqli_fetch_array($result)){
                echo '<form action="quizList.php" method="get">';
                echo '<li><input type="hidden" name="category" value="'.$row['nazwa'].'">';
                echo '<input type="submit" value="'.$row['nazwa'].'">'.'</li>';
                echo '</form>';
            }
            ?>
        </ul>
</body>
</html>
