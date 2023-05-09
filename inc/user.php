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
}

$user = new User();
