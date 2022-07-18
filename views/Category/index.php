<?php
require '..\..\vendor\autoload.php';
use App\Models\Category;
use App\Controllers\CategoryController;

$index = new CategoryController();
$params = $index->show();
?>
    