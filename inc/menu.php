<?php
class Menu
{
  public $menu;

  function __construct($menu)
  {
    $this->menu = $menu;
  }
  function get_menu()
  {
    return $this->menu;
  }
}
$header_menu = new Menu(array(
  "Home" => "index.php",
  "Products" => "products.php",
  "About" => "about.php",
  "Contact" => "contact.php",
));
$footer_menu = new Menu(array(
  "Products" => "products.php",
  "About" => "about.php",
  "Contact" => "contact.php",
));
function print_header_menu($menu)
{
  $menu_items = $menu->get_menu();
  foreach ($menu_items as $page => $url) {
    echo '<li><a href="' . $url . '" class="menu-item">' . $page . '</a></li>';
  }
}
