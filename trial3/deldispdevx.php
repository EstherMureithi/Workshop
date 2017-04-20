<?php 
include 'db.php';

$id=$_POST['id'];

if(mysql_query("DELETE FROM det_dispatch WHERE id=$id")){
	echo "<script>windows:location='dispatch.php'</script>";
}