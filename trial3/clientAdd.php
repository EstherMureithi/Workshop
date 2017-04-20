<?php
  include 'db.php';

		 $id=$_POST['id'];
      	 $companyName= $_POST['companyName'] ; 
         $contactPerson=$_POST['contactPerson'];
         $contact_pry=$_POST['contact_pry'];
         $contact_alt=$_POST['contact_alt'] ;
         $address=$_POST['address'];
         $agreement_policy=$_POST['agreement_policy'];
					
					
		$sql=mysql_query("INSERT INTO  clients (id,companyName,contactPerson,contact_pry,contact_alt,address,agreement_policy) 
          	VALUES ($id, '$companyName','$contactPerson','$contact_pry','$contact_alt','$address','$agreement_policy')");
				
				if (!$sql) {
					echo "bad";
					die('Error:'.mysql_error());
				}else{
					echo '<script>alert("success")</script>';
				echo '<script>windows: location="clients.php"</script>';
				}
				
				//('TropicalHeat','Victor Sawe','07893672','0789363','cloverfield','contract')

?>