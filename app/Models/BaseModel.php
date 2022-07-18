<?php
namespace App\Models;
use \PDO;
class BaseModel{
    private $severname;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect(){
        $this->severname = "localhost";
        $this->username = "root";  
        $this->password = "";
        $this->dbname = "testdb";
        $this->charset = "utf8mb4";
        try {
            $dsn = "mysql:host=".$this->severname.";dbname=".$this->dbname.";charset=".$this->charset;
            $conn = new PDO($dsn,$this->username,$this->password);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn; 
        } catch (PDOException $e) {
           echo "Connection failed:".$e->getMessage();
        }
    }
   
}
?>
