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
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Dispatch</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
						<li><i class="fa fa-bars"></i>Dispatch</li>
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
                 	<h2>Edit Dispatch</h2>

                  <?php
  include 'db.php';
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    if (isset($_POST['submit'])) {
      $dispatch_by=$_POST['dispatch_by'] ;
          $mst_deliveries_id= $_POST['mst_deliveries_id'] ;         
          $disp_date=$_POST['disp_date'] ;
    $query3=mysql_query("UPDATE masterdisp set dispatch_by ='$dispatch_by',
     mst_deliveries_id ='$mst_deliveries_id', ='$', disp_date='$disp_date' WHERE id =  '$id'");

    if ($query3) {
     echo '<script>windows: location="deliveries.php"</script>';
    }
  
    }
  }
  
  $query1=mysql_query("select * from masterdisp where id=$id");
  $query2=mysql_fetch_array($query1);
  ?>

             <form action="" method="POST">
 
 <input name="id" id="id" type="text" value="<?php echo $query2['id']; ?>"/><br/>
 <label>Dispatch By :<span>*</span></label>
 <input name="dispatch_by" id="dispatch_by" type="text" required value="<?php echo $query2['dispatch_by']; ?>" /><br /> 
 <label>Delivery Number :<span>*</span></label>
 <input name="mst_deliveries_id" id="mst_deliveries_id" type="text" value="<?php echo $query2['mst_deliveries_id']; ?>" required>
 
 <label>Dispatch Date:<span>*</span></label>
 <input name="disp_date" id="disp_date" type="text" value="<?php echo $query2['disp_date']; ?>"required>
 <input type="reset" value="Reset" />
 <input name="submit" type="submit" value="Edit" />
 </form>
       </div>
</div>
      </section>
 </div>
</div>
</section>