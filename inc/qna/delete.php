<?php
require('../config.php');

if (isset($_POST['delete_qna'])) {
  $id = $_POST['delete_qna'];

  $qna->delete_qna($id);

  header("Location: ../../admin.php");
}
