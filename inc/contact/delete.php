<?php
require('../config.php');

if (isset($_POST['delete_contact'])) {
    $id = $_POST['delete_contact'];
    echo $id;

    $contact->delete_contact($id);

    header("Location: ../../admin.php");
}
