<?php

function page_name()
{
  $page_name = basename($_SERVER['SCRIPT_NAME'], ".php");
  if ($page_name == "index") {
    return "Home";
  } else {
    return ucfirst($page_name);
  }
}
