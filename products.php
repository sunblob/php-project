<?php

include('partials/header.php');

$product_name = '';

if (isset($_GET['product_name'])) {
  $product_name = $_GET['product_name'];
}

$category_id =  '';

if (isset($_GET['category'])) {
  $category_id = $_GET['category'];
}

$filtered_products = $product->get_filtered_products($product_name, $category_id);

$favorite = [];

if (isset($_SESSION['id'])) {
  // map the return value so we only take ids 
  $favorite = array_map(fn ($value) => $value->id, $product->get_favorite_products($_SESSION['id']));
}

$show_fav = isset($_SESSION['id']);

foreach ($filtered_products as $p) {
  if (in_array($p->id, $favorite)) {
    $p->is_favorite = true;
  } else {
    $p->is_favorite = false;
  }
}

?>

<main>
  <section class="container">
    <h1>Products</h1>
    <div class="products">
      <div>
        <form action="products.php" method="get">
          <div class="form-input-group">
            <label class="form-label" for="product_name">Product name</label>
            <?php
            if (!empty($_GET['product_name'])) {
              echo '<input class="form-input" type="text" name="product_name" id="product_name" value="' . $_GET['product_name'] . '">';
            } else {
              echo '<input class="form-input" type="text" name="product_name" id="product_name" placeholder="Gin">';
            }
            ?>
          </div>
          <div class="form-input-group">
            <select name="category" id="category">
              <option value="all">All</option>
              <?php
              $category_list = $category->get_categories();

              foreach ($category_list as $c) {
                if ($_GET['category'] == $c->id) {
                  echo '<option value="' . $c->id . '" selected>' . $c->name . '</option>';
                } else {
                  echo '<option value="' . $c->id . '">' . $c->name . '</option>';
                }
              }
              ?>
            </select>
          </div>
          <div class="form-input-group">
            <input class="btn" type="submit" value="Find" name="get_products">
          </div>
        </form>
      </div>
      <div class="product-list">
        <?php

        print_filtered_products($filtered_products, $show_fav);
        ?>
      </div>
    </div>

  </section>
</main>

<?php

include('partials/footer.php');

?>