<?php
 include 'includes/master.html';
 include 'connect.php';
?>
<head>
 <link rel="stylesheet" href="style.css" />
</head>
<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Devices</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-bars"></i>Devices</li>
						<li><i class="fa fa-square-o"></i>Manage</li>
					</ol>
				</div>
			</div>
	<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              

                          </header><br>

                       <div class="container">
                 <div class="main">
                 	<h2>Edit Dispatch Device</h2>

                  <?php
  include 'db.php';
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    if (isset($_POST['submit'])) {
      $device_No=$_POST['device_No'] ;
          $parts_replaced=$_POST['parts_replaced'];
    $query3=mysql_query("UPDATE det_dispatch set device_No ='$device_No', parts_replaced='$parts_replaced' WHERE id = '$id'");

    if ($query3) {
     echo '<script>windows: location="deliveries.php"</script>';
    }
  
    }
  }
  
  $query1=mysql_query("select * from det_dispatch where id=$id");
  $query2=mysql_fetch_array($query1);
  ?>

             <form action="" method="POST">
 
 <input name="id" id="id" type="text" value="<?php echo $query2['id']; ?>"/><br/>
 <label>Device Number :<span>*</span></label>
 <select>
 	<option value="">Select a Device</option>
 	<?php
                              
            include 'db.php';  
            $q="select * from det_dispatch";
  
            $res=mysql_query($q) or die('wrong query');
  
            while($row=mysql_fetch_assoc($res))
            {
              echo "<option>".$row['device_id']." </option>";
            }
            ?>
 </select> <br/> 
 <label>Reported Problem :<span>*</span></label>
 <input name="parts_replaced" id="parts_replaced" type="text" value="<?php echo $query2['parts_replaced']; ?>" required>
 
 <input type="reset" value="Reset" />
 <input name="submit" type="submit" value="Submit" />
 </form>
       </div>
</div>
      </section>
 </div>
</div>
</section>