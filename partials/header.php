<?php
include('inc/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <title>
    <?php
    echo page_name();
    ?>
  </title>
</head>

<body>

  <header class="header">
    <nav class="container">
      <ul class="header-menu">
        <?php
        print_menu($header_menu);
        ?>
      </ul>
    </nav>
  </header>