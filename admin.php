<?php

include('inc/config.php');

?>

<main>

  <section>
    <div>
      <?php
      $db = Database::get_db();

      $categories = $db->query_select("SELECT * FROM categories");

      echo count($categories);

      for ($i = 0; $i < count($categories); $i++) {
        echo '<div>' . $categories[$i] . '</div>';
      }
      ?>
    </div>
  </section>
</main>