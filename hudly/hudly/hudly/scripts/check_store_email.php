<?php
require_once '../config/connection.php';
$db = new Database();
$db = $db->connect();
require_once '../model/scripts.php';
$script = new Scripts($db);
$semail = $_POST['semail'];

if ($script->checkStoreEmail($semail) == true) {
    echo '<i style="color: red;" id="er"><i class="fa fa-times"></i> Email associated with another store</i>';
} else {
    echo '<p style="color: green;" id="er"><i class="fa fa-check"></i> Email is Available</p>';
}