<?php
include 'includes/master.html';
 //session_start();
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
}
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
 
 <form method="post">
 <b>Device Details:</b>

    
 <?php $link=mysql_connect("localhost","root","") or die("cant connect");
      
   mysql_select_db("workshop",$link) or die("cant select db");
   $rowid = "SELECT MAX(id) FROM mst_deliveries ";
    $res=mysql_query($rowid,$link) or die('wrong query');
     while($row=mysql_fetch_array($res))
            {$id=$row['MAX(id)']+1;
                //echo $id;
            }?>
 <input name="mst_deliveries_id" id="mst_deliveries_id" type="text" value="<?php echo $id;?>">
 <label>Device Number :<span>*</span></label>
 <select name="device_id" id="device_id">
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
 <textarea name="reported_problem" id="reported_problem" type="text" size="50" required></textarea>
 <input type="submit" formaction="anotherDelivDevice.php" value="Add" />
 <input name="submit" formaction="delivAdd.php" type="submit" value="Finish" />
 </form>
</section>
</section>
 </div> 
 </div>
 </body>
</html>