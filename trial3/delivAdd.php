<!DOCTYPE HTML>  
<html>
 <head>
 <title>ODS || Deliveries</title>
 <link rel="stylesheet" href="style.css" />
 </head>
 <body>
 <div class="container">
 <div class="main">
 <h2>Create Delivery</h2>
 <?php
 session_start();
 if (isset($_POST['mst_deliveries_id'])) {
 if (!empty($_SESSION['post'])){
 if (empty($_POST['mst_deliveries_id'])  || empty($_POST['reported_problem']))
 { 
 // Setting error for page 3.
 $_SESSION['error_page3'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: createDeliv3.php"); // Redirecting to third page.
 } else {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 } 
 extract($_SESSION['post']); // Function to extract array.
 $connection = mysql_connect("localhost", "root", "");
 $db = mysql_select_db("workshop", $connection); // Storing values in database
 $query = mysql_query("INSERT INTO masterdeliv(id,client_id, deliv_date,deliv_by,delivNote_No)
          VALUES ('$id','$client_id','$deliv_date','$deliv_by','$delivNote_No')", $connection);
 for ($i=0; $i<$number ; $i++) { 
 	$query1 = mysql_query("INSERT INTO brought_devices (mst_deliveries_id,device_id,reported_problem)
          VALUES ('$mst_deliveries_id','".$_POST['device_id'][$i]."','".$_POST['reported_problem'][$i]."')",$connection);
   
  
 }


 /*
  $query1 = mysql_query("INSERT INTO brought_devices (mst_deliveries_id,device_id,reported_problem)
          VALUES ('$mst_deliveries_id','$device_id','$reported_problem')",$connection);
    */
 if ($query && $query1) {
 	//echo "smth";
   echo '<script>alert("success")</script>';
	echo '<script>windows: location="deliveries.php"</script>';
 } else {
 echo '<p><span>Form Submission Failed..!!</span></p>';
   die ("Error found:".mysql_error());
 } 
 unset($_SESSION['post']); // Destroying session.
 }
 } else {
 header("location: createDeliv.php"); // Redirecting to first page.
 }
 } else {
 header("location: createDeliv.php"); // Redirecting to first page.
 }
 ?>
 </div>
 </div>
 </body>
</html>
