<?php
namespace App\Models;
use \PDO;
class Signup extends BaseModel{
    public function setUser($firstname,$lastname,$email,$dob,$password){
        $stmt = $this -> connect()->prepare('INSERT INTO users (userFirstName,userLastName,userEmail,userDateOfBirth,userPwd) 
        values (:firstname, :lastname, :email, :dob, :password)');
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    public function checkRepeat($email){
        $stmt = $this -> connect()->prepare('SELECT * FROM users WHERE userEmail = :email ');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if($result){
            return false;
        }
        else
        return true;
    }
}
?>