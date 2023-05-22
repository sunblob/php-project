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
}

$product = new Product();
