<?php
require('../config.php');

if (isset($_POST['add_qna'])) {
  $data = [
    "question" => $_POST['question'],
    "answer" => $_POST['answer']
  ];

  $qna->create_qna($data);

  header("Location: ../../admin.php");
}
