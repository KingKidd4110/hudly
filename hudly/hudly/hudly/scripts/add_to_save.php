<?php
if (isset($_POST['save_product'])) {
    require_once '../config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once '../model/scripts.php';
    $script = new Scripts($db);

    session_start();
    $pid = $_POST['pid'];
    $uid = $_SESSION['id'];
    if ($uid == "") {
        echo "<script>
        alert('Please Login to Save Products');
        </script>";
    } else {
    

    if ($script->getProductSaved($uid, $pid) == false) {
        $save = $script->saveProduct($uid, $pid);
        echo "<script>alert('Product Saved');
        $('.hred".$pid."').css('color', 'red');
        </script>";
    } else {
        echo "<script>
        $('#heart".$pid."').css('color', 'red');
        alert('Item alread exits in Saved Items');
        </script>";
    }
}
}