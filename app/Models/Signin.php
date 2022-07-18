<?php
namespace App\Models;
use \PDO;
class Signin extends BaseModel{
    public function getSignin($email,$pwd){
        $stmt = $this -> connect()->prepare('SELECT userPwd FROM users WHERE userEmail = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if($result){
            if($pwd === $result[0]['userPwd']){
                return true;
            }
            else
            return false;
        }
        else;
        return false;
    }
}
?>