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

  function print_categories()
  {
    $categories = $this->get_categories();
    foreach ($categories as $item) {
      echo '<div>' . $item->name;
      echo '<div style="background-image: url(\'' . $item->image . '\')">';
      // echo '<img src="' . $item->image . '">';
      echo '</div>';
    }
  }
}

$category = new Category();
