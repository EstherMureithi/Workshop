 <?php
include 'includes/master.html'; 
//session_start();

if (isset($_POST['id'])){
 if (empty($_POST['id']) || empty($_POST['deliv_date']))
 { 
 // Setting error message
 $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
 //echo "<script> windows:location = 'createDeliv.php' </script>";
 header("location: createDeliv.php"); // Redirecting to first page 
 }
 else {
 // Fetching all values posted from second page and storing it in variable.
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 }
 }
} else {
 if (empty($_SESSION['error_page2'])) {
 header("location: createDeliv.php");// Redirecting to first page.
 } 
 
 }

 
?>
<!DOCTYPE HTML>
<html>
 <head>
 <title>ODS||Deliveries</title>
 <link rel="stylesheet" href="style.css" />
 </head>
 <body>
 	<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Deliveries</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-bars"></i>Deliveries</li>
						<li><i class="fa fa-square-o"></i>Manage</li>
					</ol>
				</div>
			</div>
 <div class="container">
 <div class="main">
 <h2>ODS || Deliveries</h2><hr/>
 <span id="error">
<?php
// To show error of page 2.
if (!empty($_SESSION['error_page2'])) {
 echo $_SESSION['error_page2'];
 unset($_SESSION['error_page2']);
}
?>
 </span>
 
 <form action="createDeliv3.php" method="post">
 <label>Who Delivered :<span>*</span></label>
 <input name="deliv_by" id="deliv_by" type="text" value="" >
 <label>Delivery Note :<span>*</span></label><br />
 <input name="delivNote_No" id="delivNote_No" type="text" value="" >
 <label>Number of devices</label>
 <input name="number" type="text">
 
 <input type="reset" value="Reset" />
 <input type="submit" value="Next" />
 </form>
 </div>
</section>
 </div>
 </section>

 </body>
</html>
