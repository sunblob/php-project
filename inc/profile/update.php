<?php


if (isset($_POST['update_profile'])) {
  if (isset($_POST['profile_image'])) {
    $target_dir = "images/";

    $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);

    if ($check) {
    }
  }
}
