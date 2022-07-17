<?php
namespace App\Controllers;
use App\Models\Category;
class CategoryController{
    public function show(){
        $categories = new Category();
        $categories->createCategory("Anime");
        var_dump($categories->getAllCategories());
    }
}
?>