<?php
namespace App\Controllers;
use App\Models\Product;
class ProductController{
    public function show(){
        $product = new Product();
        $product->createProduct("SherLock Home","Book","Kim Dong",200);
        var_dump($product->getAllProducts());
    }
}
?>
?>