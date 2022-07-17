<?php
namespace App\Models;
use \PDO;

class Product extends BaseModel{
    public function getAllProducts(){
        $stmt = $this -> connect() ->prepare('SELECT * FROM product'); 
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }
    public function findProducts($product){
        $stmt = $this -> connect()->prepare('SELECT * FROM product WHERE productName = :product');
        $stmt->bindParam(':product', $product);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }
    public function createProduct($name,$category,$producer,$price){
        $stmt = $this -> connect()->prepare('INSERT INTO product (productName,category,producerName,productPrice) 
        values (:name, :category, :producer, :price)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':producer', $producer);
        $stmt->bindParam(':price', $price);
        $stmt->execute();
    }
    public function deleteProduct($id){
        $stmt = $this -> connect()->prepare('DELETE FROM product (productId) 
        values (:id)');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>