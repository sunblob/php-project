<?php

function page_name(): string
{
  $page_name = basename($_SERVER['SCRIPT_NAME'], ".php");
  if ($page_name == "index") {
    return "Home";
  } else {
    return ucfirst($page_name);
  }
}

function upload_image($target_dir, $field): string
{
  // $target_dir = "../../images/";

  if (!is_dir($target_dir)) {
    echo 'ITS NOT A DIR';
  }

  $file_tmp = $_FILES[$field]['tmp_name'];
  $file_name = $_FILES[$field]['name'];
  $file_destination = $target_dir . $file_name;

  $target_file = $target_dir . basename($_FILES[$field]["name"]);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  $check = getimagesize($file_tmp);

  if ($check && ($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'jpeg')) {
    if (move_uploaded_file($file_tmp, $file_destination)) {
      // echo "The file " . htmlspecialchars(basename($file_name)) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  return preg_replace('/(\.\.\/)+/', '/bar/', $file_destination);
}
