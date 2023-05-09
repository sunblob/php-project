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

      echo $categories[0]->name;

      for ($i = 0; $i <= count($categories); $i++) {
        echo '<div>' . $categories[$i]->name . '</div>';
      }
      ?>
    </div>
  </section>
</main>