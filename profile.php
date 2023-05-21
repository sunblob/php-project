<?php
include('partials/header.php');
if ($current_user == null) {
  header("Location: index.php");
}
?>

<main>
  <section class="container">
    Profile

    <form action="inc/profile/update.php" method="post" enctype="multipart/form-data">
      <div class="form-input-group">
        <label class="form-label" for="">Login</label>
        <?php
        echo '<input class="form-input" type="text" value="' . $current_user->login . '" disabled>'
        ?>
      </div>
      <div class="form-input-group">
        <label class="form-label" for="">Email</label>
        <?php
        echo '<input class="form-input" type="email" value="' . $current_user->email . '" disabled>'
        ?>
      </div>
      <div class="form-input-group">
        <label class="form-label" for="">First name</label>
        <?php
        echo '<input class="form-input" type="text" name="profile_first_name" value="' . $current_user->first_name . '" placeholder="First name">'
        ?>
      </div>
      <div class="form-input-group">
        <label class="form-label" for="">Last name</label>
        <?php
        echo '<input class="form-input" type="text" name="profile_last_name" value="' . $current_user->last_name . '" placeholder="First name">'
        ?>
      </div>
      <div class="form-input-group">
        <input class="btn" type="submit" value="Update" name="update_profile">
      </div>
    </form>
  </section>
</main>

<?php

include('partials/footer.php');

?>