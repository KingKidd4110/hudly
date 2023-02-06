<?php
if (isset($_POST['clear_save'])) {
   require_once '../config/connection.php';
   $db = new Database();
   $db = $db->connect();
   require_once '../model/scripts.php';
   $script = new Scripts($db);
   session_start();
   $uid = $_SESSION['id'];
   if ($uid == "") {
       echo "<script>
       alert('Please Login to Save Products');
       </script>";
   } else {
   

   if ($script->clearProductSaved($uid) == true) {
       echo "<script>alert('Saved Items Cleared');
       </script>";
   } else {
       echo "<script>
       alert('Something went wrong');
       </script>";
   }
}
}