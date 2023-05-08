<?php

class Database
{
  public PDO $conn;
  private static ?Database $instance = null;

  private function __construct()
  {
    try {
      $this->conn = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'root', '');
    } catch (PDOException $e) {
      var_dump($e->getMessage());
    }
  }

  // singleton class for connections
  static function get_db(): Database
  {
    if (self::$instance == null) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  function query_select(string $str)
  {
    try {
      $query =  $this->conn->query($str);
      $contact = $query->fetchAll(PDO::FETCH_OBJ);
      return $contact;
    } catch (PDOException $e) {
      print_r($e->getMessage());
    }
  }

  function query_create(string $str, $data)
  {
    try {
      $query_run = $this->conn->prepare($str);
      $query_run->execute($data);
    } catch (PDOException $e) {
      print_r($e->getMessage());
    }
  }

  function query_delete(string $str)
  {
    try {
      $query = $this->conn->exec($str);
    } catch (PDOException $e) {
      print_r($e->getMessage());
    }
  }

  public function __clone()
  {
    throw new Exception("Can't clone a singleton");
  }
}
