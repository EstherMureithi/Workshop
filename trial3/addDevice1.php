<?php
  include 'db.php';

			 		$id=$_POST['id'] ;
			 		$device_No=$_POST['device_No'] ;
					$firmwire= $_POST['firmwire'] ;					
					$version=$_POST['version'] ;
					$type=$_POST['type'] ;
					
					
		$sql=mysql_query("INSERT INTO  devices (id,device_No,firmwire,version,type) 
		 VALUES ('$id','$device_No','$firmwire','$version','$type')"); 
				
				if (!$sql) {
					echo "bad";
				}else{
					echo '<script>alert("success")</script>';
				echo '<script>windows: location="devices.php"</script>';
				}
				

?>