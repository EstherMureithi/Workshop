<?php

if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';

	
	}
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['client_id'])){
 if (empty($_POST['client_id']) || empty($_POST['deliv_date']) || empty($_POST['id']))
 { 
 // Setting error message
 $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
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
 <link rel="stylesheet" href="style.css" />
 </head>
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
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-head ing">
                              Create a delivery
                          </header><br>

 <body>
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
 <form action="page3_form.php" method="post">
 <label>Who Delivered :<span>*</span></label>
 <input name="deliv_by" id="deliv_by" type="text" value="" >
 <label>Delivery Note :<span>*</span></label><br />
 <input name="delivNote_No" id="delivNote_No" type="text" value="" >
 
 <input type="reset" value="Reset" />
 <input type="submit" value="Next" />
 </form>
 </div>
 </div>
 </body>
</html>
