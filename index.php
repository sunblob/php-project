<?php
include('inc/config.php');
include('partials/header.php');

?>

<main>
  <section class="banner">

  </section>
  <section class="container">
    <?php
    print_categories($category->get_categories());
    ?>
  </section>

</main>

<?php

include('partials/footer.php');

?>