<?php

require('../config.php');

if (isset($_POST['contact_us'])) {

  $data = [
    'contact_name' => $_POST["contact_name"],
    'contact_email' => $_POST["contact_email"],
    'contact_message' => $_POST["contact_message"],
  ];

  $db = Database::get_db();

  $db->query_create("INSERT INTO contacts (name, email, message) VALUES (:contact_name, :contact_email, :contact_message)", $data);
  header("Location: ../../index.php");
} else {
  print_r("Error sending the form");
}
