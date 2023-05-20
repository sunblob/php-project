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

        if ($current_user == null) {
          echo '<li class="ml-auto auth-btn">';
          echo '<span>Login/Register</span>';
          echo '</li>';
        } else {
          echo '<li class="menu-icon ml-auto">';
          echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53L12 21.35Z"/></svg>';
          echo '</li>';
          echo '<li class="menu-icon">';
          echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M8 7a4 4 0 1 1 8 0a4 4 0 0 1-8 0Zm0 6a5 5 0 0 0-5 5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3a5 5 0 0 0-5-5H8Z" clip-rule="evenodd"/></svg>';
          echo '</li>';
          echo '<li class="menu-icon logout-btn">';
          echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M14 8V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2v-2"/><path d="M9 12h12l-3-3m0 6l3-3"/></g></svg>';
          echo '</li>';
        }
        ?>
      </ul>
    </nav>
  </header>

  <?php
  include('auth/modal.php');
  ?>