<?php
if (isset($_POST['ulogin'])) {
    require_once '../config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once '../model/scripts.php';
    $script = new Scripts($db);

    $email = $_POST['uemail'];
    $password = $script->securePass($_POST['upass']);

$chk = $script->login($email, $password);
if ($chk->rowCount() == 1) {
    while ($a = $chk->fetch(PDO::FETCH_ASSOC)) {
       $fname = $a['fname'];
       $lname = $a['lname'];
       $uid = $a['id'];

       $display_name = $fname;
       session_start();
       $_SESSION['id'] = $uid;
       $_SESSION['email'] = $email;
       $_SESSION['fullname'] = $display_name;

       header("location:../");
    }
} else {
    echo '<script>
    var chk = alert("Invalid Email or/and Password");
    if(chk == true){
        window.location.replace("../");
    } else {
        window.location.replace("../");
    }
    </script>';
}
}
