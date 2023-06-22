<?php
if(isset($_SESSION['user'])){
    $user = unserialize($_SESSION['user']);
    if($user->role == 4){
        header('Location: ../index/index.php');
        exit();
    }
}