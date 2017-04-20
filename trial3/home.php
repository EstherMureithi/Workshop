<?php
include 'includes/master.html';
include 'connect.php';
?>
<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Home</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
						
					</ol>
	
					</section>
				</div>
			</div>
              <!-- page start-->
              				<section class="panel">
              					<header class="panel-heading">
                              <h3>Device diagnostics</h3>

                          </header><br>
						 <?php
$print = ""; // assign an empty string 

$stmt = $dbc->query("SELECT devices.id, devices.type,brought_devices.device_id,brought_devices.reported_problem,det_dispatch.parts_replaced FROM devices
  ,brought_devices,det_dispatch where devices.device_No=brought_devices.device_id and
  brought_devices.device_id=det_dispatch.device_id"); // fetch data
$stmt->setFetchMode(PDO::FETCH_OBJ);


if($stmt->execute() <> 0)
{

    echo "<table class='table table-stripped'>
<tr>
<th>#</th>
<th>Device</th>
<th>Type</th>
<th>Reported Problem</th>
<th>Device Analysis</th>
</tr>";
 

    while($dev = $stmt->fetch()) // loop and display data
    {

  echo "<tr>";
  echo "<td>" . $dev->{'id'}. "</td>";
  echo "<td>" . $dev->{'device_id'}. "</td>";
  echo "<td>" . $dev->{'type'} . "</td>";
  echo "<td>" . $dev->{'reported_problem'} . "</td>";
  echo "<td>" . $dev->{'parts_replaced'} . "</td>";
  echo "</tr>";
    }
}
   echo "</table>";
 
?>
              <!-- page end-->
          </section>
      </section>