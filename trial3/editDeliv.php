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
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Deliveries</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-bars"></i>Deliveries</li>
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
                 	<h2>Edit Delivery</h2>

                  <?php
  include 'db.php';
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    if (isset($_POST['submit'])) {
      $client_id=$_POST['client_id'] ;
          $deliv_date= $_POST['deliv_date'] ;         
          $deliv_by=$_POST['deliv_by'] ;
          $delivNote_No=$_POST['delivNote_No'] ;
    $query3=mysql_query("UPDATE mst_deliveries set client_id ='$client_id',
     deliv_date ='$deliv_date', deliv_by='$deliv_by', delivNote_No='$delivNote_No' WHERE id = '$id'");

    if ($query3) {
     echo '<script>windows: location="deliveries.php"</script>';
    }
  
    }
  }
  
  $query1=mysql_query("select * from mst_deliveries where id=$id");
  $query2=mysql_fetch_array($query1);
  ?>

             <form action="" method="POST">
 
 <input name="id" id="id" type="text" value="<?php echo $query2['id']; ?>"/><br/>
 <label>Client :<span>*</span></label>
 <input name="client_id" id="client_id" type="text" required value="<?php echo $query2['client_id']; ?>" /><br /> 
 <label>Delivery Date :<span>*</span></label>
 <input name="deliv_date" id="deliv_date" type="text" value="<?php echo $query2['deliv_date']; ?>" required>
 <label>Delivered By :<span>*</span></label>
 <input name="deliv_by" id="deliv_by" type="text" value="<?php echo $query2['deliv_by']; ?>"required>
 <label>Delivery Note Number :<span>*</span></label>
 <input name="delivNote_No" id="delivNote_No" type="text" value="<?php echo $query2['delivNote_No']; ?>"required>
 <input type="reset" value="Reset" />
 <input name="submit" type="submit" value="Edit" />
 </form>
       </div>
</div>
      </section>
 </div>
</div>
</section>