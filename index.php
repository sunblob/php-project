<?php
include('inc/config.php');
// include('inc/database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  kek

  <?php

  $db = Database::get_db();
  $users = $db->query_select("SELECT * FROM users");
  echo $users;

  // $db2 = new Database();
  ?>
</body>

</html>