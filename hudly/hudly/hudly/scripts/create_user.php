<?php
if (isset($_POST['Cuser'])) {
    require_once '../config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once '../model/scripts.php';
    $script = new Scripts($db);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $script->securePass($_POST['password']);
    $rpass = $script->securePass($_POST['rpassword']);

    if ($pass == $rpass) {
        if ($script->checkUserEmail($email) == false) {
            if ($script->createUser($fname, $lname, $email, $pass, $rpass) == true) {
                header("location: ../account/register.php?e=s");
            } else {
                echo "Something went wrong";
            }
        } else {
            header("location: ../account/register.php?e=eae");
        }
    } else {
        header("location: ../account/register.php?e=pdnm");
    }
}