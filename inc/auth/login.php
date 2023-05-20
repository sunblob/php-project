<?php
require('../config.php');
session_start();

$data = [
  'user_email' => $_POST["user_email"],
  'user_password' => hash(hash_algos()[4], $_POST["user_password"]),
];

$user_name = "";
if (isset($_POST['log_user'])) {

  $found_user = $user->get_by_email($data['user_email']);

  if (count($found_user) != 0 && $found_user[0]->password == $data['user_password']) {
    $user_login = $found_user[0]->login;
    $user_id = $found_user[0]->id;

    $_SESSION['valid'] = true;
    $_SESSION['user_login'] = $user_login;
    $_SESSION['id'] = $user_id;

    header("Location: ../../index.php");
  } else {
    header("Location: ../../wrong-password.php");
  }
}
