<?php
include('inc/config.php');
include('partials/header.php');

?>

<main>
  <section class="banner">

  </section>
  <section class="container">
    <?php
    $category->print_categories();
    ?>
  </section>

</main>

<?php

include('partials/footer.php');

?>