<?php
  
  define("DB_HOST", "localhost");    // Using Constants
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "workshop");

try {       // << using Try/Catch() to catch errors!

$dbc = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset-utf8",DB_USER,DB_PASS);
}catch(PDOException $e){ echo $e->getMessage();}

if($dbc <> true){
    die("<p>There was an error</p>");
}
?>