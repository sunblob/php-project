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
    $query = "INSERT INTO users (login, email, password) VALUES (:user_login, :user_email, :user_password)";
    $this->db->query_create($query, $data);
  }

  function update_user(mixed $data)
  {
    $query = 'UPDATE users SET first_name=:first_name, last_name=:last_name, image=:image WHERE id=:id';

    $this->db->query_update($query, $data);
  }

  function delete_user(string $id)
  {
    $this->db->query_delete('DELETE FROM users WHERE id=' . $id);
  }
}

$user = new User();
