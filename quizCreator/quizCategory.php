<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wybierz kategorie</title>
</head>
<body>
    <form action="quizCategory.php" method="post">
        <input type="text" name="quizName" placeholder="Nazwa Quizu">
        <select name="category" id="">
            <?php
                session_start();
                $connection = mysqli_connect('localhost', 'root', 'root', 'ProjektPHP');
                $query = "SELECT * FROM kategorie;";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['nazwa'] . '">' . $row['nazwa'] . '</option>';
                }
            ?>
        </select>
        <p><input type="submit" value="Dalej"></p>
    </form>
    <?php
    if(!empty($_POST['quizName'])) {
        $query = "SELECT * FROM quizy;";
        $result = mysqli_query($connection, $query);
        $_SESSION['quizID'] = mysqli_num_rows($result) + 1;
        $_SESSION['quizName'] = $_POST['quizName'];
        $_SESSION['quizCategory'] = $_POST['category'];
        header('Location: quizCreator.php');
    }
    ?>
</body>
</html>
