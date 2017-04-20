<?php
include 'db.php';

$id=$_POST['id'];
if(mysql_query("DELETE FROM brought_devices WHERE id=$id"))
{
   echo "<script>windows:location='deliveries.php'</script>";
}