<?php

include('../config.php');

$data = [
  "product_id" => $_POST['product_id'],
  "user_id" => $_POST['user_id']
];

$query = "INSERT INTO favorite_products (product_id, user_id) VALUES(:product_id, :user_id)";

Database::get_db()->query_create($query, $data);

header('Location: ../../products.php');
