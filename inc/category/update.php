
<?php
require('../config.php');

if (isset($_POST['update_category'])) {
  $data = [
    "id" => $_POST['category_id'],
    "name" => $_POST['category_name'],
    "description" => $_POST['category_description'],
    "image" => $_POST['category_image'],
  ];

  var_dump($data);

  $category->update_category($data);

  header("Location: ../../admin.php");
}
