<?php
require('inc/config.php');

session_start();

$current_user = null;

if (isset($_SESSION['id'])) {
  $current_user = $user->get_by_id($_SESSION['id'])[0];
}

if ($current_user == null || $current_user->role != 'ADMIN') {
  header("Location: no-permission.php");
}

?>

<?php
include('partials/admin/header.php');
?>

<body>
  <main class="container">
    <section>
      <h1>Welcome <?php echo ($_SESSION['user_login']); ?></h1>
    </section>

    <section class="accordion-list">
      <div class="accordion open">
        <div class="accordion-title">
          QNA
        </div>
        <div class="accordion-body">
          <div class="accordion-inner">
            <div class="admin-table">
              <div class="admin-add">
                <h3>Add question</h3>
                <form method="post" action="inc/qna/insert.php">
                  <div class="form-input-group">
                    <label for="" class="form-label">Question</label>
                    <input class="form-input" type="text" name="question" id="question" placeholder="Question" required>
                  </div>
                  <div class="form-input-group">
                    <label for="" class="form-label">Answer</label>
                    <textarea class="form-input" name="question" id="question" placeholder="Answer" required></textarea>
                  </div>
                  <div class="form-input-group">
                    <input class="btn" type="submit" value="Add" name="add_qna">
                  </div>
                </form>
              </div>
              <div class="admin-panel">
                <div class="admin-info qna">
                  <div class="admin-info-label">Id</div>
                  <div class="admin-info-label">Question</div>
                  <div class="admin-info-label">Answer</div>
                </div>
                <div class="admin-list">
                  <?php
                  $qna_list = $qna->get_qna();
                  foreach ($qna_list as $q) {
                    echo '<div class="admin-row qna">';
                    echo '<div class="admin-row-id">' . $q->id . '</div>';
                    echo '<div>' . $q->question . '</div>';
                    echo '<div>' . $q->answer . '</div>';
                    echo '<div>
                            <form action="inc/qna/update.php" method="post">
                              <input type="submit" value="Edit" value="update_qna">
                            </form>
                          </div>';
                    echo '<div>
                            <form action="inc/qna/delete.php" method="post">
                              <input type="submit" value="Delete" value="delete_qna">
                            </form>
                          </div>';

                    echo '</div>';
                  }

                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="accordion">
        <div class="accordion-title">
          Contact
        </div>
        <div class="accordion-body">
          <div class="accordion-inner">
            <div class="admin-table contact">
              <div class="admin-add">
              </div>
              <div class="admin-panel">
                <div class="admin-info contact">
                  <div class="admin-info-label">Id</div>
                  <div class="admin-info-label">Name</div>
                  <div class="admin-info-label">Email</div>
                  <div class="admin-info-label">Message</div>
                </div>
                <div class="admin-list">
                  <?php
                  $contact_list = $contact->get_contacts();
                  foreach ($contact_list as $c) {
                    echo '<div class="admin-row contact">';
                    echo '<div class="admin-row-id">' . $c->id . '</div>';
                    echo '<div>' . $c->name . '</div>';
                    echo '<div>' . $c->email . '</div>';
                    echo '<div>' . $c->message . '</div>';
                    echo '<div>
                            <form action="inc/contact/delete.php" method="post">
                              <input type="submit" value="Delete" value="delete_contact">
                            </form>
                          </div>';

                    echo '</div>';
                  }

                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="accordion">
        <div class="accordion-title">
          Categories
        </div>
        <div class="accordion-body">
          <div class="accordion-inner">
            <div class="admin-table category">
              <div class="admin-add">
                <h3>Add category</h3>
                <form method="post" action="inc/category/insert.php">
                  <div class="form-input-group">
                    <label for="" class="form-label">Name</label>
                    <input class="form-input" type="text" name="category_name" id="category_name" placeholder="Name" required>
                  </div>
                  <div class="form-input-group">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-input" name="category_description" id="category_description" placeholder="Description"></textarea>
                  </div>
                  <div class="form-input-group">
                    <label for="" class="form-label">Image</label>
                    <input class="form-input" type="text" name="category_image" id="category_image" placeholder="image url" required>
                  </div>
                  <div class="form-input-group">
                    <input class="btn" type="submit" value="Add" name="add_category">
                  </div>
                </form>
              </div>
              <div class="admin-panel">
                <div class="admin-info category">
                  <div class="admin-info-label">Id</div>
                  <div class="admin-info-label">Image</div>
                  <div class="admin-info-label">Name</div>
                  <div class="admin-info-label">Description</div>
                </div>
                <div class="admin-list">
                  <?php
                  $category_list = $category->get_categories();
                  foreach ($category_list as $cat) {
                    echo '<div class="admin-row category">';
                    echo '<div class="admin-row-id">' . $cat->id . '</div>';
                    echo '<div>
                            <img class="admin-row-image" src="' . $cat->image . '">
                          </div>';
                    echo '<div>' . $cat->name . '</div>';
                    echo '<div>' . $cat->description . '</div>';
                    echo '<div>
                            <form action="inc/category/update.php" method="post">
                              <input type="submit" value="Edit" value="update_category">
                            </form>
                          </div>';
                    echo '<div>
                            <form action="inc/category/delete.php" method="post">
                              <input type="submit" value="Delete" value="delete_category">
                            </form>
                          </div>';

                    echo '</div>';
                  }

                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="accordion">
        <div class="accordion-title">
          Products
        </div>
        <div class="accordion-body">
          <div class="accordion-inner">
            <div class="admin-table product">
              <div class="admin-add">
                <h3>Add product</h3>
                <form method="post" action="inc/product/insert.php">
                  <div class="form-input-group">
                    <label for="" class="form-label">Name</label>
                    <input class="form-input" type="text" name="product_name" id="product_name" placeholder="Name" required>
                  </div>
                  <div class="form-input-group">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-input" name="product_description" id="product_description" placeholder="Description"></textarea>
                  </div>
                  <div class="form-input-group">
                    <label for="" class="form-label">Price</label>
                    <input class="form-input" type="number" min="1" name="product_price" id="product_price" placeholder="1" required>
                  </div>
                  <div class="form-input-group">
                    <div class="flex">
                      <label for="" class="form-label">In Stock</label>
                      <input type="checkbox" name="product_stock" id="product_stock">
                    </div>

                  </div>
                  <div class="form-input-group">
                    <label for="" class="form-label">Image</label>
                    <input class="form-input" type="text" name="product_image" id="product_image" placeholder="image url" required>
                  </div>
                  <div class="form-input-group">
                    <label for="" class="form-label">Category</label>
                    <select name="product_category" id="product_category">
                      <?php
                      $cat_list = $category->get_categories();

                      foreach ($cat_list as $cat) {
                        echo '<option value="' . $cat->id . '">' . $cat->name . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-input-group">
                    <input class="btn" type="submit" value="Add" name="add_product">
                  </div>
                </form>
              </div>
              <div class="admin-panel">
                <div class="admin-info product">
                  <div class="admin-info-label">Id</div>
                  <div class="admin-info-label">Image</div>
                  <div class="admin-info-label">Name</div>
                  <div class="admin-info-label">Description</div>
                  <div class="admin-info-label">Price</div>
                  <div class="admin-info-label">In Stock</div>
                  <div class="admin-info-label">Category Id</div>
                </div>
                <div class="admin-list">
                  <?php
                  $product_list = $product->get_products();
                  foreach ($product_list as $p) {
                    echo '<div class="admin-row product">';
                    echo '<div class="admin-row-id">' . $p->id . '</div>';
                    echo '<div>
                            <img class="admin-row-image" src="' . $p->image . '">
                          </div>';
                    echo '<div>' . $p->name . '</div>';
                    echo '<div class="admin-row-description">' . $p->description . '</div>';
                    echo '<div>' . $p->price . '</div>';
                    echo '<div>' . $p->in_stock . '</div>';
                    echo '<div>' . $p->category_id . '</div>';
                    echo '<div>
                            <form action="inc/product/update.php" method="post">
                              <input type="submit" value="Edit" value="update_product">
                            </form>
                          </div>';
                    echo '<div>
                            <form action="inc/product/delete.php" method="post">
                              <input type="submit" value="Delete" value="delete_product">
                            </form>
                          </div>';

                    echo '</div>';
                  }

                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

</body>

</html>