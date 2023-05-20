<?php
require('../config.php');

if (isset($_POST['reg_user'])) {

  $data = [
    'user_login' => $_POST["user_login"],
    'user_email' => $_POST["user_email"],
    // hash using sha256 algo
    'user_password' => hash(hash_algos()[4], $_POST["user_password"])
  ];

  if (empty($data["user_login"]) || empty($data["user_email"]) || empty($data["user_password"])) {
    echo 'All fileds must be filled';
  } else {
    $found_user = $user->get_by_email($data['user_email']);

    if (count($found_user) == 0) {
      $user->create_user($data);

      header("Location: ../../thankyou.php");
    } else {
      echo 'User already exists';
      header("Location: ../../index.php");
    }
  }
}
