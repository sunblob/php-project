<?php

class QNA
{
  private Database $db;

  function __construct()
  {
    $this->db = Database::get_db();
  }

  function get_qna()
  {
    return $this->db->query_select("SELECT * FROM qna");
  }

  function create_qna(mixed $data)
  {
    $query = "INSERT INTO qna (question, answer) VALUES (:question, :answer)";

    $this->db->query_create($query, $data);
  }

  function update_qna(mixed $data)
  {
    $query = "UPDATE qna SET question=:question, answer=:answer WHERE id=:id";

    $this->db->query_update($query, $data);
  }

  function delete_qna(string $id)
  {
    $this->db->query_delete("DELETE FROM qna WHERE id=" . $id);
  }

  function print_qna()
  {
    $question_list = $this->get_qna();

    foreach ($question_list as $question) {
      echo '<div class="question-item">';
      // question title
      echo '<div class="question-title">' . $question->question . '</div>';

      // question body
      echo '<div class="question-answer">';
      echo ' <div class="answer">' . $question->answer . '</div>';
      echo '</div>';

      echo '</div>';
    }
  }
}

$qna = new QNA();
