<?php

require('../config.php');

$db = Database::get_db();

if (isset($_POST['contact_us'])) {

  $data = [
    'contact_name' => $_POST["contact_name"],
    'contact_email' => $_POST["contact_email"],
    'contact_message' => $_POST["contact_message"],
  ];

  $db->query_create("INSERT INTO contact (contact_name, contact_email,contact_message) VALUES (:contact_name, :contact_email,:contact_message)", $data);
} else {
  print_r("Error sending the form");
}
