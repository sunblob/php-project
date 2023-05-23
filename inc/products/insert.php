
<?php
require('../config.php');

if (isset($_POST['add_product'])) {
  $stock = 1;

  if (!isset($_POST['product_stock'])) {
    $stock = 0;
  }

  $data = [
    "name" => $_POST['product_name'],
    "description" => $_POST['product_description'],
    "image" => $_POST['product_image'],
    "price" => $_POST['product_price'],
    "in_stock" => $stock,
    "category_id" => $_POST['product_category'],
  ];

  $product->create_product($data);

  header("Location: ../../admin.php");
}
