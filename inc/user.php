<?php

class User
{
  private Database $db;

  function __construct()
  {
    $this->db = Database::get_db();
  }

  function get_users(): array
  {
    return $this->db->query_select("SELECT * FROM users");
  }

  function get_by_id(string $id)
  {
    return $this->db->query_select("SELECT * FROM users WHERE id =" . $id);
  }

  function get_by_email(string $email)
  {
    return $this->db->query_select("SELECT * FROM users WHERE email = '" . $email . "'");
  }

  function create_user($data)
  {
    $query = "INSERT INTO users (user_name, user_email, user_password) VALUES (:user_name, :user_email, :user_password)";
    $this->db->query_create($query, $data);
  }
}

$user = new User();
