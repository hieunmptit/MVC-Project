<?php
require '..\..\..\vendor\autoload.php';
use App\Models\Product;
use App\Controllers\ProductController;

$index = new ProductController();
$params = $index->show();
?>
