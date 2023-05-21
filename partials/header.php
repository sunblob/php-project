<?php
include('inc/config.php');
session_start();
$current_user = null;
if (isset($_SESSION['id'])) {
  $current_user = $user->get_by_id($_SESSION['id'])[0];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <script defer src="js/index.js"></script>
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

        print_auth_menu($current_user);
        ?>
      </ul>
    </nav>
  </header>

  <?php
  include('auth/modal.php');
  ?>