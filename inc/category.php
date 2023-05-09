<?php

class Category
{
  private Database $db;

  function __construct()
  {
    $this->db = Database::get_db();
  }

  function get_categories(): array
  {
    return $this->db->query_select("SELECT * FROM categories");
  }
}

$category = new Category();
