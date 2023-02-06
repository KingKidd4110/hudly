<?php
if(isset($_POST['addemail'])){
    require_once '../config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once '../model/scripts.php';
    $script = new Scripts($db);
    $email = $_POST['email'];
    if($script->isSubscribed($email) == true) {
        if($script->updateSubscribed($email, "subscribed") == true){
            header("location:../");
        } else {
            echo "Something went wrong1";
        }
    } else {
        $insert = $script->subscribe($email);
        if($insert == true){
            header("location:../");
        } else {
            echo "Something went wrong";
        }
    }
}