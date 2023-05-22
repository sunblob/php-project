<?php
include('partials/header.php');
if ($current_user == null) {
  return header("Location: index.php");
}
?>

<main>
  <section class="container">
    <h1>Profile</h1>

    <form action="inc/profile/update.php" method="post" enctype="multipart/form-data">
      <div class="form-input-group">
        <?php
        if ($current_user->image == null) {
          echo '<img class="profile-image" src="images/no-profile-image.jpg" alt="">';
        } else {
          echo '<img class="profile-image" src="' . $current_user->image . '" alt="user_image">';
        }
        ?>
        <input type="file" name="profile_image" id="profile_image">
      </div>
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
      <?php
      echo '<input type="hidden" name="user_id" value="' . $current_user->id . '"' . '>';
      ?>
      <?php
      echo '<input type="hidden" name="user_image" value="' . $current_user->image . '"' . '>';
      ?>
      <div class="form-input-group">
        <input class="btn" type="submit" value="Update" name="update_profile">
      </div>
    </form>
  </section>
</main>

<?php

include('partials/footer.php');

?>