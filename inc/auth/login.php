<?php
require('../config.php');
session_start();

$data = [
  'user_email' => $_POST["user_email"],
  'user_password' => hash(hash_algos()[4], $_POST["user_password"]),
];

$user_name = "";
if (isset($_POST['log_user'])) {

  // echo $data['user_email'];

  $found_user = $user->get_by_email($data['user_email']);
  // $found_user = $user->get_users();

  if (count($found_user) != 0 && $found_user[0]->password == $data['user_password']) {
    $user_name = $found_user[0]->first_name;
    $_SESSION['valid'] = true;
    $_SESSION['user_name'] = $user_name;
    header("Location: ../../index.php");
  } else {
    echo 'Wrong password';
  }
}
