<!DOCTYPE HTML>  
<html>
 <head>
    <title>ODS || dispatch</title>
 <link rel="stylesheet" href="style.css" />
 </head>
   <body>
 <div class="container">
 <div class="main">
 <h2>Create Dispatch</h2>
 <?php
 session_start();
 if (isset($_POST['mst_dispatch_id'])) {
 if (!empty($_SESSION['post'])){
 if (empty($_POST['mst_dispatch_id']) || empty($_POST['device_id']) || empty($_POST['parts_replaced']))
 {  
 // Setting error for page 3.
 $_SESSION['error_page3'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: createDisp2.php"); // Redirecting to third page.
 } else {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 } 
 extract($_SESSION['post']); // Function to extract array.
 $connection = mysql_connect("localhost", "root", "");
 $db = mysql_select_db("workshop", $connection); // Storing values in database.
 $query = mysql_query("INSERT INTO masterdisp(id,dispatch_by, mst_deliveries_id,disp_date,invoice_no)
          VALUES ('$id','$dispatch_by','$mst_deliveries_id','$disp_date','$invoice_no')", $connection) or die('Error from master:'.mysql_error());
 for ($i=0; $i<$number ; $i++) { 
 	$query1 = mysql_query("INSERT INTO det_dispatch (mst_dispatch_id,device_id,parts_replaced)
          VALUES ('$mst_dispatch_id','".$_POST['device_id'][$i]."','".$_POST['parts_replaced'][$i]."')",$connection);
 	$query2 = mysql_query("UPDATE brought_devices set status=1 where device_id= '".$_POST['device_id'][$i]."'");
 }
/*    $query1 = mysql_query("INSERT INTO det_dispatch (mst_dispatch_id,device_id,parts_replaced)
          VALUES ('$id','$device_id','$parts_replaced')",$connection);
    */
 if ($query && $query1) {
 	echo '<script>alert("success")</script>';
				echo '<script>windows: location="dispatch.php"</script>';
 //echo '<p><span id="success">Form Submitted successfully..!!</span></p>';
 //header("location: dispatch.php");  
 } else {
 echo '<p><span>Form Submission Failed..!!</span></p>';
 echo "Error".mysql_error();
  
 } 
 unset($_SESSION['post']); // Destroying session.
 }
 } else {
 header("location: createDisp.php"); // Redirecting to first page.
 }
 } else {
 header("location: createDisp.php"); // Redirecting to first page.
 }
 ?>
 </div>
 </div>
 </body>
</html>
