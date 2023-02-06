<?php
session_start();
if(isset($_SESSION['email']) AND isset($_POST['remove'])) {
    require_once '../config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once '../model/scripts.php';
    $script = new Scripts($db);
    $script->removeCartItem($_POST['id']);
    echo "<script>
    $('#trch').trigger('click');
    </script>";
}