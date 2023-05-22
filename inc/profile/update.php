<?php
include('../config.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['update_profile'])) {
  $image_path = $_POST['user_image'];

  if (file_exists($_FILES['profile_image']['tmp_name']) || is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
    $image_path = upload_image('../../images/profile/', 'profile_image');
  }

  echo $image_path;

  $data = [
    'id' => $_POST['user_id'],
    'first_name' => $_POST['profile_first_name'],
    'last_name' => $_POST['profile_last_name'],
    'image' => $image_path,
  ];

  echo $_POST['profile_first_name'];


  $user->update_user($data);

  header('Location: ../../profile.php');
}
