<?php
$connection = mysqli_connect('localhost','root','root','ProjektPHP');
if(isset($_POST['submit']) && !empty($_FILES['file']['name'])){
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = "../uploads/".$fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $query = "UPDATE users SET obrazek = '{$fileName}' WHERE id={$user->id};";
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $insert = executeQuery($query);
            if($insert){
                $user->picture = $fileName;
                $_SESSION['user'] = serialize($user);
                header("Location: Profile.php");
                exit();
            }
        }
    }
}


?>