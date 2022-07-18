<?php
session_start();
require '..\..\vendor\autoload.php';
use App\Controllers\SigninController;
if($_POST)
{
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $error = [];
    $signin = new SigninController($email,$pwd);
    $error = $signin -> signinUser();
    if($error){
        $_SESSION['error'] = $error;
        $_SESSION['old'] = $_POST;
        header('location: index.php');
        exit();
    }
    else{
        header('location: ../Home');
    }

}
?>