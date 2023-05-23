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

  function create_category(mixed $data)
  {
    $query = "INSERT INTO categories (name, description, image) VALUES (:name, :description, :image)";

    $this->db->query_create($query, $data);
  }

  function update_category(mixed $data)
  {
    $query = 'UPDATE categories SET name=:name, description=:description, image=:image WHERE id=:id';

    $this->db->query_update($query, $data);
  }

  function delete_category(string $id)
  {
    $this->db->query_delete("DELETE FROM categories WHERE id=" . $id);
  }
}

$category = new Category();

function print_categories($categories)
{
  echo '<div class="category-list">';

  foreach ($categories as $item) {
    echo '<div class="category-item" style="background-image: url(\'' . $item->image . '\')">';
    echo '<h2 class="category-name">' . $item->name . '</h2>';
    echo '<a class="btn category-btn" href="products.php?category=' . $item->id . '">Visit</a>';
    echo '</div>';
  }

  echo '</div>';
}
