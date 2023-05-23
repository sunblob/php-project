<?php
require('../config.php');

if (isset($_POST['delete_contact'])) {
    $id = $_POST['delete_contact'];

    $contact->delete_contact($id);

    header("Location: ../../admin.php");
}
