<?php
if (isset($_POST['slogin'])) {
    require_once '../config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once '../model/scripts.php';
    $script = new Scripts($db);
    $email = $_POST['semail'];
    $password = $script->securePass($_POST['spassword']);
    $store_login = $script->store_login($email, $password);


if (!$store_login == false) {
    while ($a = $store_login->fetch(PDO::FETCH_ASSOC)) {
       $sname = $a['sname'];
       $sphone = $a['sphone'];
       session_start();
       $_SESSION['semail'] = $email;
       $_SESSION['slink'] = $a['slink'];
       $_SESSION['fullname'] = $sname;
       $_SESSION['phone'] = $sphone;
       header("location:../dashboard/");
    }
} else {
    echo '<script>
    var chk = confirm("Invalid Email or/and Password");
    if(chk == true){
        window.location.replace("../");
    } else {
        window.location.replace("../");
    }
    </script>';
}
}
