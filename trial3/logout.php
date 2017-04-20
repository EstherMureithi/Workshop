<?php
   session_start();
   unset($_SESSION['id']);

   echo "<script> windows:location = 'index.php' </script>";
   //header("index.php");

?>