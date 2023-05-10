<?php
require('../config.php');

$db =  Database::get_db();

if(isset($_POST['delete_contact'])){
    $id = $_POST["delete_contact"];
    $sql = 'DELETE FROM contact WHERE id ='.$id;
    
    $db->query_delete($sql);
}
