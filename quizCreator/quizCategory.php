<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style1.css">
    <title>Wybierz kategorie</title>

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
            </div>
        </div>
        <div class="footer">
            <!-- <p>123</p> -->
        </div>
    </div>


</body>
</html>
