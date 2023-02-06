<?php
if (isset($_POST['Cstore'])) {
    require_once '../config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once '../model/scripts.php';
    $script = new Scripts($db);

    $sname = $_POST['sname'];
    $semail = $_POST['semail'];
    $sphone = $_POST['sphone'];
    
    $PageTitle=$sname;
    // Remove HTML Tags if found
    $string=strip_tags($PageTitle);
    // Replace special characters with white space
    $string=preg_replace('/[^A-Za-z0-9-]+/', ' ', $PageTitle);
    // Trim White Spaces and both sides
    $strin=trim($string);
    // Replace whitespaces with Hyphen (-)
    $stri=preg_replace('/[^A-Za-z0-9-]+/','-', $strin);
    // Convert final string to lowercase
    $slink=strtolower($stri);

    $spass = $script->securePass($_POST['spassword']);
    $srpass =  $script->securePass($_POST['srpassword']);

    if ($spass == $srpass) {
        if ($script->checkStoreTotal($sname, $semail, $sphone) == false) {
            if ($script->createStore($sname, $sphone, $semail, $slink, $spass) == true) {
               echo "<script>alert('Online Store has been created Successfully')
               window.location.replace('../index.php');
               </script>";
            } else {
                echo "Something went wrong";
            }
        } else {
            header("location: ../account/onlinestore.php?e=eae");
        }
    } else {
        header("location: ../account/onlinestore.php?e=pdnm");
    }
}