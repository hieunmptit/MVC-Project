<?php
session_start();
require '..\..\vendor\autoload.php';
use App\Controllers\SignupController;
if($_POST)
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $dob = $_POST['dateofbirth'];
    $pwd = $_POST['password'];
    $repeatpwd = $_POST['repeat_password'];
    $error = [];
    $signup = new SignupController($firstname,$lastname,$email,$dob,$pwd,$repeatpwd);
    $error = $signup -> signupUser();
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