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
 if (isset($_POST['id'])) {
 if (!empty($_SESSION['post'])){
 if (empty($_POST['id']) || empty($_POST['contactPerson']) || empty($_POST['contact_pry']))
 { 
 // Setting error for page 3.
 $_SESSION['error_page3'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: addClient.php"); // Redirecting to third page.
 } else {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 } 
 extract($_SESSION['post']); // Function to extract array.
 $connection = mysql_connect("localhost", "root", "");
 $db = mysql_select_db("workshop", $connection); // Storing values in database.
 $query = mysql_query("INSERT INTO clients (id, companyName,contactPerson,contactPerson,contact_pry,contact_alt,address,warranty) 
      	VALUES ($id, $companyName, $contactPerson,$contact_pry,$contact_alt,$address,$warranty)", $connection);
    
    
 if ($query) {
 echo '<p><span id="success">Form Submitted successfully..!!</span></p>';
 //header("location: deliveries.php");  
 } else {
 echo '<p><span>Form Submission Failed..!!</span></p>';
  
 } 
 unset($_SESSION['post']); // Destroying session.
 }
 } else {
 header("location: addClient.php"); // Redirecting to first page.
 }
 } else {
 header("location: addClient.php"); // Redirecting to first page.
 }
 ?>
 </div>
 </div>
 </body>
</html>
