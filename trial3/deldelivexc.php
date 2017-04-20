<?php
include 'db.php';

$id=$_POST['id'];
if(mysql_query("DELETE FROM masterdeliv WHERE id=$id"))
{
	echo "<script>windows:location='deliveries.php'</script>";
}