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
}

$qna = new QNA();


function print_qna($qna)
{
  foreach ($qna as $question) {
    echo '<div class="accordion">';
    // question title
    echo '<div class="accordion-title">' . $question->question . '</div>';

    // question body
    echo '<div class="accordion-body">';
    echo ' <div class="answer">' . $question->answer . '</div>';
    echo '</div>';

    echo '</div>';
  }
}
