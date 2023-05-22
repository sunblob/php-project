<?php

include('../config.php');

$query = "DELETE FROM favorite_products WHERE product_id=" . $_POST['product_id'] . " AND user_id=" . $_POST['user_id'];

Database::get_db()->query_delete($query);

header('Location: ../../products.php');
