<?php
include('partials/header.php');

$fav_products = $product->get_favorite_products($_SESSION['id']);

?>

<main>
  <section class="container">
    <h1>Favorite</h1>
    <div class="product-list">
      <?php

      print_filtered_products($fav_products);

      ?>
    </div>
  </section>
</main>

<?php

include('partials/footer.php');

?>