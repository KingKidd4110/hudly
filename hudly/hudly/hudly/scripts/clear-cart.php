<?php
session_start();
if(isset($_SESSION['email'])) {
   require_once '../config/connection.php';
   $db = new Database();
   $db = $db->connect();
   require_once '../model/scripts.php';
   $script = new Scripts($db);
   $uid = $_SESSION['id'];
   if($script->clearCart($uid) == true){
      echo "<script>
      $('#trcc').trigger('click');
      alert('Cart has been cleared');
      </script>";
   } else {
      echo "<script>
      $('#trcc').trigger('click');
      alert('Something went wrong');
      </script>";
   }
}
