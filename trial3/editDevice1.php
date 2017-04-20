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
                 	<h2>Add Device</h2>

                  <?php
  include 'db.php';
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    if (isset($_POST['submit'])) {
      $device_No=$_POST['device_No'] ;
          $firmwire= $_POST['firmwire'] ;         
          $version=$_POST['version'] ;
          $type=$_POST['type'] ;
    $query3=mysql_query("UPDATE devices set device_No ='$device_No',
     firmwire ='$firmwire', version='$version', type='$type' WHERE id = '$id'");

    if ($query3) {
     echo '<script>windows: location="devices.php"</script>';
    }
  
    }
  }
  
  $query1=mysql_query("select * from devices where id=$id");
  $query2=mysql_fetch_array($query1);
  ?>

             <form action="" method="POST">
 
 <input name="id" id="id" type="text" value="<?php echo $query2['id']; ?>"/><br/>
 <label>Device Number :<span>*</span></label>
 <input name="device_No" id="device_No" type="text" required value="<?php echo $query2['device_No']; ?>" /><br /> 
 <label>Firmwire :<span>*</span></label>
 <input name="firmwire" id="firmwire" type="text" value="<?php echo $query2['firmwire']; ?>" required>
 <label>Version :<span>*</span></label>
 <input name="version" id="version" type="text" value="<?php echo $query2['version']; ?>"required>
 <label>Type :<span>*</span></label>
 <select id="type" name="type">
 	<option value="">Choose...</option>
 	<option value="Scale">Scale</option>
 	<option value="Printer">Printer</option>
 	<option value="Phone">Phone</option>
 </select>
 <input type="reset" value="Reset" />
 <input name="submit" type="submit" value="Submit" />
 </form>
       </div>
</div>
      </section>
 </div>
</div>
</section>