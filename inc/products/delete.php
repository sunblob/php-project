<?php
require('../config.php');

if (isset($_POST['delete_product'])) {
  $id = $_POST['delete_product'];

  $product->delete_product($id);

  header("Location: ../../admin.php");
}
