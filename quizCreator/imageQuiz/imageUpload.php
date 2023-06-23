<?php
$connection = mysqli_connect('localhost','root','root','ProjektPHP');

if(isset($_POST['submit']) && !empty($_FILES['file']['name']) && !empty($_POST['question']) && !empty($_POST['answer'])){
    $targetDir = "../uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $query = "INSERT INTO images (file_name) VALUES ('{$fileName}');";
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $insert = mysqli_query($connection,$query);
            if($insert){
                $question = new \Classes\imageQuiz($_POST['question'],$fileName,strtolower($_POST['answer']));
                $_SESSION['questions'][] = serialize($question);
                header("Location: quizCreator.php");
                exit();
            }
        }
    }
}

?>

