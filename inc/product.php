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

  function get_favorite_products($user_id)
  {
    $query = 'SELECT p.id, p.name, p.description, p.price, p.in_stock, p.image, p.category_id FROM products p JOIN favorite_products fp ON p.id = fp.product_id JOIN users u ON u.id = fp.user_id WHERE u.id=' . $user_id;

    return $this->db->query_select($query);
  }
}

$product = new Product();

function print_filtered_products($products, $show_fav = false)
{
  foreach ($products as $p) {
    echo '<div class="product-item">';

    echo '<img class="product-item__image" src="' . $p->image . '" alt="image">';
    echo '<div class="product-item__info">';
    echo '<div class="flex space-between align-center">';
    echo '<h3 class="product-name">' . $p->name . '</h3>';

    if ($show_fav) {
      if ($p->is_favorite) {
        echo '<form method="post" action="inc/products/remove-fav.php" class="fav-form">';
        echo '<input class="fav-icon" type="image" id="remove-fav" name="remove-fav" src="images/icons/heart.svg">';
        echo '<input type="hidden" name="user_id" value="' . $_SESSION['id'] . '" >';
        echo '<input type="hidden" name="product_id" value="' . $p->id . '" >';
        echo '</form>';
        // echo '<div class="product-fav fav" style="background-image: url(\'images/icons/heart.svg\')"></div>';
      } else {
        echo '<form method="post" action="inc/products/add-fav.php" class="fav-form">';
        echo '<input class="fav-icon" type="image" id="add-fav" name="add-fav" src="images/icons/heart-outline.svg">';
        echo '<input type="hidden" name="user_id" value="' . $_SESSION['id'] . '" >';
        echo '<input type="hidden" name="product_id" value="' . $p->id . '" >';
        echo '</form>';
        // echo '<div class="product-fav" style="background-image: url(\'images/icons/heart-outline.svg\')"></div>';
      }
    }

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

function print_favorite_products($favorite)
{
  foreach ($favorite as $p) {
    echo '<div class="product-item">';

    echo '<img class="product-item__image" src="' . $p->image . '" alt="image">';
    echo '<div class="product-item__info">';
    echo '<div class="flex space-between align-center">';
    echo '<h3 class="product-name">' . $p->name . '</h3>';

    echo '<form method="post" action="inc/products/remove-fav.php" class="fav-form">';
    echo '<input class="fav-icon" type="image" id="remove-fav" name="remove-fav" src="images/icons/heart.svg">';
    echo '<input type="hidden" name="user_id" value="' . $_SESSION['id'] . '" >';
    echo '<input type="hidden" name="product_id" value="' . $p->id . '" >';
    echo '</form>';

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
