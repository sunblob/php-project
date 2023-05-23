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

function print_menu($menu)
{
  $menu_items = $menu->get_menu();
  foreach ($menu_items as $page => $url) {
    echo '<li><a href="' . $url . '" class="menu-link">' . $page . '</a></li>';
  }
}

function print_auth_menu($user)
{
  if ($user == null) {
    echo '<li class="ml-auto auth-btn">';
    echo '<span>Login/Register</span>';
    echo '</li>';
  } else {
    echo '<li class="menu-icon ml-auto">';
    echo '<a href="favorite.php">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53L12 21.35Z"/></svg>';
    echo '</a>';
    echo '</li>';
    echo '<li class="menu-icon">';
    echo '<a href="profile.php">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M8 7a4 4 0 1 1 8 0a4 4 0 0 1-8 0Zm0 6a5 5 0 0 0-5 5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3a5 5 0 0 0-5-5H8Z" clip-rule="evenodd"/></svg>';
    echo '</a>';
    echo '</li>';
    if ($user->role == 'ADMIN') {
      echo '<li class="menu-icon">';
      echo '<a href="admin.php">';
      echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m9.25 22l-.4-3.2q-.325-.125-.613-.3t-.562-.375L4.7 19.375l-2.75-4.75l2.575-1.95Q4.5 12.5 4.5 12.337v-.674q0-.163.025-.338L1.95 9.375l2.75-4.75l2.975 1.25q.275-.2.575-.375t.6-.3l.4-3.2h5.5l.4 3.2q.325.125.613.3t.562.375l2.975-1.25l2.75 4.75l-2.575 1.95q.025.175.025.338v.674q0 .163-.05.338l2.575 1.95l-2.75 4.75l-2.95-1.25q-.275.2-.575.375t-.6.3l-.4 3.2h-5.5Zm2.8-6.5q1.45 0 2.475-1.025T15.55 12q0-1.45-1.025-2.475T12.05 8.5q-1.475 0-2.488 1.025T8.55 12q0 1.45 1.012 2.475T12.05 15.5Z"/></svg>';
      echo '</a>';
      echo '</li>';
    }
    echo '<li class="menu-icon logout-btn">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M14 8V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2v-2"/><path d="M9 12h12l-3-3m0 6l3-3"/></g></svg>';
    echo '</li>';
  }
}
