<?php
require_once '../config/connection.php';
$db = new Database();
$db = $db->connect();
require_once '../model/scripts.php';
$script = new Scripts($db);
$email = $_POST['email'];

if ($script->checkUserEmail($email) == true) {
    echo '<i style="color: red;" id="er"><i class="fa fa-times"></i> Email associated with another account</i>';
} else {
    echo '<p style="color: green;" id="er"><i class="fa fa-check"></i> Email is Available</p>';
}