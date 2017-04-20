<?php
//ob_start();
session_start();
if(!isset($_SESSION['user_id'])){
ob_end_clean();
$url = 'http://' .$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
if((substr($url, -1) == '/') OR (substr($url, -1) == '\\') ) {
 $url = substr($url, 0, -1);
 }
$url .='/index.php';
header("Location: $url");
exit();
}
//ob_end_flush();
?>