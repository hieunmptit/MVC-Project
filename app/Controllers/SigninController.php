<?php
namespace App\Controllers;
use App\Models\Signin;
class SigninController extends Signin{
    private $email;
    private $pwd;

    public function __construct($email,$pwd){
        $this -> email = $email;
        $this -> pwd = $pwd;
    }

    public function signinUser(){
        $error =[];
        if($this->checkEmail()){
            $error['email'] = $this -> checkEmail();
        }
        if($this -> getSignin($this->email,$this->pwd) == false){
            $error['password'] = "Wrong Password";
        }
        if($this->checkPwd()){
            $error['password'] = $this -> checkPwd();
        }
        if($error){
            return $error;
        }     
    }

    public function checkEmail(){
        $result;
        if(empty($this->email)){
            return $result = "Email is reqired";
        }
        if( false == filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $error['email']= $this->email;
            $error['email'] .= 'is not email address';
        }
    }
    public function checkPwd(){
        $result;
        if(empty($this->pwd)){
            return $result = "Password is reqired";
        }
        
    }
}

?>