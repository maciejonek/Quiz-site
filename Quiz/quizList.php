<?php
$connection = mysqli_connect('localhost','root','root','ProjektPHP');
$query = "SELECT * FROM quizy WHERE kategoria = '{$_GET['category']}'";
$result = mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Quiz'ów</title>
</head>
<body>
    <ul>
            <?php
            while($row = mysqli_fetch_array($result)){
                echo '<form action="quiz.php" method="post">';
                echo '<li><input type="hidden" name="quizId" value="'.$row['id'].'">';
                echo '<input type="submit" value="'.$row['nazwa'].'">'.'</li>';
                echo '</form>';
            }
            ?>
    </ul>
</body>
</html>