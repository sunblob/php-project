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
    $this->db->query_create("", $data);
  }
}

$product = new Product();
