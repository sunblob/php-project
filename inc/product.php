<?php

class Product
{
  private Database $db;

  function __construct()
  {
    $this->db = Database::get_db();
  }

  function get_products(): array
  {
    return $this->db->query_select("SELECT * FROM products");
  }

  function create_product($data)
  {
    $query = "INSERT INTO products (name, description, price, in_stock, image, category_id) VALUES (:name, :description, :price, :in_stock, :image, :category_id)";

    $this->db->query_create($query, $data);
  }

  function update_product(mixed $data)
  {
    $query = 'UPDATE categories SET name=:name, description=:description, price=:price, in_stock=:in_stock, image=:image, category_id=:category_id WHERE id=:id';

    $this->db->query_update($query, $data);
  }

  function delete_product(string $id)
  {
    $this->db->query_delete("DELETE FROM products WHERE id=" . $id);
  }

  function get_filtered_products($name, $category)
  {
    $query = 'SELECT * FROM products ';

    if (!empty($name) || (!empty($category) && $category != 'all')) {
      $query = $query . 'WHERE';
    }

    if (!empty($name)) {
      $query = $query . " name LIKE '%" . $name . "%'";
    }

    if (!empty($name) && !empty($category) && $category != 'all') {
      $query = $query . ' AND';
    }

    if (!empty($category) && $category != 'all') {
      $query = $query . ' category_id=' . $category;
    }

    // echo $query;

    return $this->db->query_select($query);
  }
}

$product = new Product();

function print_filtered_products($products)
{
  foreach ($products as $p) {
    echo '<div class="product-item">';

    echo '<img class="product-item__image" src="' . $p->image . '" alt="image">';
    echo '<div class="product-item__info">';
    echo '<div class="flex space-between align-center">';
    echo '<h3 class="product-name">' . $p->name . '</h3>';
    echo '<div class="product-fav" style="background-image: url(\'images/icons/heart-outline.svg\')"></div>';

    echo '</div>';
    echo '<div class="product-description">' . $p->description . '</div>';

    echo '<div class="flex space-between">';
    echo '<div class="product-price">' . $p->price . ' €</div>';
    if ($p->in_stock) {
      echo '<div class="product-stock">In stock</div>';
    } else {
      echo '<div class="product-stock">Out of stock</div>';
    }
    echo '</div>';

    echo '</div>';
    echo '</div>';
  }
}
