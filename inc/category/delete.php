<?php
require('../config.php');

if (isset($_POST['delete_category'])) {
  $id = $_POST['delete_category'];

  $category->delete_category($id);

  header("Location: ../../admin.php");
}
