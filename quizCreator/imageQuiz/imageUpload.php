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
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                header("Location: quizCreator.php");
                exit();
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

echo $statusMsg;
?>

