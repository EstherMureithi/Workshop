<?php 
include 'db.php';

$id=$_POST['id'];

if(mysql_query("DELETE FROM masterdisp WHERE id=$id")){
	echo "<script>windows:location='dispatch.php'</script>";
}