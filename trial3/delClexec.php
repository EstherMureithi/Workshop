<?php
include 'db.php';

$id=$_POST['id'];

if(mysql_query("DELETE FROM clients WHERE id=$id")){
	echo "<script>windows:location='clients.php'</script>";
}