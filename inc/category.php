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

    echo '<div class="category-list">';

    foreach ($categories as $item) {
      echo '<div class="category-item" style="background-image: url(\'' . $item->image . '\')">' . $item->name;
      echo '<div ></div>';
      echo '</div>';
    }

    echo '</div>';
  }
}

$category = new Category();
