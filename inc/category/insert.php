
<?php
require('../config.php');

if (isset($_POST['add_category'])) {
  $data = [
    "name" => $_POST['category_name'],
    "description" => $_POST['category_description'],
    "image" => $_POST['category_image'],
  ];

  $category->create_category($data);

  header("Location: ../../admin.php");
}
