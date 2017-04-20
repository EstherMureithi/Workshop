<?php
include 'includes/master.html';
//session_start();
// Checking first page values for empty, If it finds any blank field then redirected to first page.
if (isset($_POST['dispatch_by'])){
 if (empty($_POST['dispatch_by'])|| empty($_POST['mst_deliveries_id']) || empty($_POST['invoice_no']))
 { 
 $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
 echo "<script>windows:location='createDisp.php'</script>"; // Redirecting to first page. 
 } else {
 // Fetching all values posted from first page and storing it in variable.
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 }
 }
} else {
 if (empty($_SESSION['error_page3'])) {
 header("location: createDisp.php");// Redirecting to first page.
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
 <h2>Create Dispatch</h2><hr/>
 <span id="error">
 <?php
 if (!empty($_SESSION['error_page3'])) {
 echo $_SESSION['error_page3'];
 unset($_SESSION['error_page3']);
 }
 ?>
 </span>
 
 <form action="dispAdd.php" method="post">
 <b>Device Details:</b>
    
 <?php $link=mysql_connect("localhost","root","") or die("cant connect");
      
   mysql_select_db("workshop",$link) or die("cant select db");
   $rowid = "SELECT MAX(id) FROM masterdisp ";
    $res=mysql_query($rowid,$link) or die('wrong query');
     while($row=mysql_fetch_array($res))
            {
              $id=$row['MAX(id)']+1;
                //echo $id;
            }?>
 <input name="mst_dispatch_id" id="mst_dispatch_id" type="text" value="<?php echo $id;?>">
 <?php
 $number = $_POST['number'];
 for ($i=1; $i<=$number ; $i++) { 
   
 
 ?>
 <label>Device Number :<span>*</span></label>
<select name="device_id[]"> 
  <option value="">Choose Device</option>
  <?php
             $mst_deliveries_id= $_POST['mst_deliveries_id'] ;               
            $link=mysql_connect("localhost","root","") or die("cant connect");
      
            mysql_select_db("workshop",$link) or die("cant select db");
  
            $q="SELECT * from brought_devices where mst_deliveries_id=$mst_deliveries_id";//select * from brought_devices where mst_deliveries_id=$mst_deliveries_id
  
            $res=mysql_query($q,$link) or die('wrong query');
  
            while($row=mysql_fetch_assoc($res))
            {
              echo "<option>".$row['device_id']." </option>";
            }
            ?>
 </select>
 <label>Diagnosis :</label>
 <textarea name="parts_replaced[]" id="parts_replaced[]" type="text" size="350" required></textarea>
<?php } ?>
<input type="hidden" placeholder="some space"> 
 <input type="reset" value="Reset" />
 <input name="submit" type="submit" value="Submit" />
 </form>
</section>
</section>
 </div> 
 </div>
 </body>
</html>