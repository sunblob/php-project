<?php
include('partials/header.php');

?>

<main>
  <?php

  include('partials/banner.php');
  ?>
  <section class="container">
    <?php
    print_categories($category->get_categories());
    ?>
  </section>

</main>

<?php

include('partials/footer.php');

?>