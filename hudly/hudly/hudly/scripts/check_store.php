<?php
require_once '../config/connection.php';
$db = new Database();
$db = $db->connect();
require_once '../model/scripts.php';
$script = new Scripts($db);
$sname = $_POST['sname'];

if ($script->checkStore($sname) == true) {
    echo '<i style="color: red;" id="er"><i class="fa fa-times"></i> Store name is taken</i>';
} else {
    echo '<p style="color: green;" id="er"><i class="fa fa-check"></i> Store name is Available</p>';
}