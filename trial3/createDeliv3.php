<?php
include 'includes/master.html';
//session_start();
// Checking second page values for empty, If it finds any blank field then redirected to second page.
if (isset($_POST['deliv_by'])){
 if (empty($_POST['deliv_by']) || empty($_POST['delivNote_No']))
 { 
 $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
 header("location: createDeliv2.php"); // Redirecting to second page. 
 } else {
 // Fetching all values posted from second page and storing it in variable.
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 }
 }
} else {
 if (empty($_SESSION['error_page3'])) {
 header("location: createDeliv.php");// Redirecting to first page.
 }
}

?>
<!DOCTYPE HTML>
<html>
 <head>
 <title>ODS || Deliveries </title>
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
 <body>
 <div class="container">
 <div class="main">
 <h2>Create Delivery</h2><hr/>
 <span id="error">
 <?php
 if (!empty($_SESSION['error_page3'])) {
 echo $_SESSION['error_page3'];
 unset($_SESSION['error_page3']);
 }
 ?>
 </span>
 
 
 <form action="delivAdd.php" method="post">
  
 <b>Device Details:</b>

    
 <?php $link=mysql_connect("localhost","root","") or die("cant connect");
      
   mysql_select_db("workshop",$link) or die("cant select db");
   $rowid = "SELECT MAX(id) FROM masterdeliv ";
    $res=mysql_query($rowid,$link) or die('wrong query');
     while($row=mysql_fetch_array($res))
            {$id=$row['MAX(id)']+1;
                //echo $id;
            }?>
 <input name="mst_deliveries_id" id="mst_deliveries_id" type="text" value="<?php echo $id;?>">
 <?php
 $number=$_POST['number'];
  for ($i=1; $i<=$number ; $i++) { 
     
 ?>
<div colspan="2">
  <label>Device <?php echo $i; ?></label>
</div>
 <label>Device ID :<span>*</span></label>


 <label>Device Number :<span>*</span></label>
 <select name="device_id[]" id="device_id[]">
 	<option value="">Select a Device</option>
 	<?php
                              
            $link=mysql_connect("localhost","root","") or die("cant connect");
      
            mysql_select_db("workshop",$link) or die("cant select db");
  
            $q="select * from devices";
  
            $res=mysql_query($q,$link) or die('wrong query');
  
            while($row=mysql_fetch_assoc($res))
            {
              echo "<option>".$row['device_No']." </option>";
            }
            ?>
 </select>
 <label>Reported Problem :</label>
 <textarea name="reported_problem[]" id="reported_problem[]" type="text" required></textarea>
 
 <?php
}
 ?>
 <input type="submit" formaction="anotherDelivDevice.php" value="Add" />
 <input name="submit" formaction="delivAdd.php" type="submit" value="Finish" />
 </form>
</section>
</section>
 </div> 
 </div>
 </body>
</html>