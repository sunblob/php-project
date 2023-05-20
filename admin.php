<?php
require('inc/config.php');
session_start();
$current_user = null;
if (isset($_SESSION['id'])) {
  $current_user = $user->get_by_id($_SESSION['id'])[0];
}
// if ($current_user == null || $current_user->role != 'ADMIN') {
//   header("Location: no-permission.php");
// }

if ($current_user == null) {
  header("Location: no-permission.php");
}
?>

<main>

  <section>
    <div>
      <?php
      $db = Database::get_db();

      $categories = $db->query_select("SELECT * FROM categories");


      print_r($_SESSION);
      echo $_SESSION['id'];
      echo $current_user->login;
      ?>
    </div>
  </section>
</main>