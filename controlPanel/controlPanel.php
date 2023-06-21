<?php
    include '../Operations/classLoader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link rel="stylesheet" href="../CSS/style1.css">-->
    <title>Control Panel</title>
</head>
<body>
<?php
    include '../HTML/menu.html';
    if(!empty($_SESSION['user'])){
        $user = unserialize($_SESSION['user']);
        if($user->role != 1){
            echo '<h1>Błąd logowania</h1>';
            exit();
        }
    }
    else{
        echo '<h1>Błąd logowania</h1>';
        exit();
    }
?>
<form action="controlPanel.php" method="post">
    <input type="submit" name="option" value="Kategorie">
    <input type="submit" name="option" value="Quizy">
</form>
    <br>

<?php
    if(isset($_POST['option'])){
        $_SESSION['option'] = $_POST['option'];
    }
    $connection= mysqli_connect('localhost','root','root','ProjektPHP');
    if(isset($_SESSION['option'])){
        if($_SESSION['option'] == 'Kategorie')
            include 'categories.php';
        elseif($_SESSION['option'] == 'Quizy')
            include 'collection.php';
    }
?>
</body>
</html>
