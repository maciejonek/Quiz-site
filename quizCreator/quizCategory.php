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
    <title>Wybierz kategorie</title>

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
            include '../Operations/checkLogin.php';
            ?>
            <div class="info">
                <form action="quizCategory.php" method="post">
                    <div class="colorBorder">
                    <input type="text" name="quizName"  placeholder="Nazwa Quizu">
                    <select name="category" id="">
                        <?php
                        session_start();
                        $connection = mysqli_connect('localhost', 'root', 'root', 'ProjektPHP');
                        $query = "SELECT * FROM kategorie;";
                        $result = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' . $row['nazwa'] . '">' . strtoupper($row['nazwa']) . '</option>';
                        }
                        ?>
                    </select>
                    </div>
                    <p><input type="submit" class="colorBorder submit" value="Dalej"></p>
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
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>


</body>
</html>
