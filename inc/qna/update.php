<?php
require('../config.php');

if (isset($_POST['update_qna'])) {
  $data = [
    "id" => $_POST['form_id'],
    "question" => $_POST['update_question'],
    "answer" => $_POST['update_answer']
  ];

  if (!empty($data['question']) || !empty($data['answer'])) {
    $qna->update_qna($data);
  }

  header("Location: ../../admin.php");
}
