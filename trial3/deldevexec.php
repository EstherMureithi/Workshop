      <?php
include 'db.php';
  $id = $_POST['id'];
 if (mysql_query("DELETE from devices WHERE id='$id'"));
     {
     echo "<script>windows: location='devices.php'</script>"; 
   }
   ?>