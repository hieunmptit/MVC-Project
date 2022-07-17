<?php
namespace App\Models;
use \PDO;

class Category extends BaseModel{
    public function getAllCategories(){
        $stmt = $this -> connect() ->prepare('SELECT * FROM category'); 
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }
    public function findCategories($category){
        $stmt = $this -> connect()->prepare('SELECT * FROM category WHERE categoryName = :category');
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }
    public function createCategory($category){
        $stmt = $this -> connect()->prepare('INSERT INTO category (categoryName) 
        values (:category)');
        $stmt->bindParam(':category', $category);
        $stmt->execute();
    }
    public function deleteCategory($id){
        $stmt = $this -> connect()->prepare('DELETE FROM category (categoryId) 
        values (:id)');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>