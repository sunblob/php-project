<?php
require('../config.php');

if (isset($_POST['update_qna'])) {
  $data = [
    "id" => $_POST['form_id'],
    "question" => $_POST['update_question'],
    "answer" => $_POST['update_answer']
  ];

  $qna->update_qna($data);

  header("Location: ../../admin.php");
}
