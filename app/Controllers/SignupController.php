<?php
namespace App\Controllers;
use App\Models\Signup;
class SignupController extends Signup{
    private $firstname;
    private $lastname;
    private $email;
    private $dob;
    private $pwd;
    private $repeatpwd;

    public function __construct($firstname,$lastname,$email,$dob,$pwd,$repeatpwd){
        $this -> firstname = $firstname;
        $this -> lastname = $lastname;
        $this -> email = $email;
        $this -> dob = $dob;
        $this -> pwd = $pwd;
        $this -> repeatpwd = $repeatpwd;
    }

    public function signupUser(){
        $error =[];
        if($this->checkFirstName()){
            $error['firstname'] = $this -> checkFirstName();
        }
        if($this->checkLastName()){
            $error['lastname'] = $this -> checkLastName();
        }
        if($this->checkEmail()){
            $error['email'] = $this -> checkEmail();
        }
        if($this->checkPwd()){
            $error['password'] = $this -> checkPwd();
        }
        if($this->checkRepeatPwd()){
            $error['repeat_password'] = $this -> checkRepeatPwd();
        }
        if($this -> checkEmailMatch() == false){
            $error['uid'] = "this email has taken";
        }
        if($error){
            return $error;
        }
        else{
            $this -> setUser($this->firstname,$this->lastname,$this->email,$this->dob,$this->pwd,$this->repeatpwd);
        }
    }

    public function checkFirstName(){
        $result;
        if(empty($this->firstname)){
            return $result = "Firstname is required";
        }
        if(preg_match('~[0-9]+~', $this->firstname)){
            return $result = "Firstname must not have nummber";
        }
    }
    public function checkLastName(){
        $result;
        if(empty($this->lastname)){
            return $result = "Lastname is required";
        }
        if(preg_match('~[0-9]+~', $this->lastname)){
            return $result = "Lastname must not have nummber";
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
    public function checkRepeatPwd(){
        $result;
        if(empty($this->repeatpwd)){
            return $result = "Repeat Password is reqired";
        }
        if($this->repeatpwd !== $this->pwd){
            return $result = "Password and Repeat Password dont match";
        }
    }
    
    public function checkEmailMatch(){
        $result = $this ->checkRepeat($this->email);
        return $result;
    }
}

?>