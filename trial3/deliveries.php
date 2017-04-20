<?php
  include 'includes/master.html';
  include 'connect.php';

?>

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
                             Deliveries Listing 

                          </header><br>
                          <a class='btn btn-success' href='createDeliv.php'> <i class='icon_plus_alt2'></i> ADD </a><br>
                          
                          <?php


$stmt = $dbc->query("SELECT * FROM masterdeliv"); // fetch data
$stmt->setFetchMode(PDO::FETCH_OBJ);

if($stmt->execute() <> 0)
{

    echo "<table class='table table-stripped'>
<tr>
<th>#</th>
<th><i class='icon_profile'></i> Client</th>
 <th><i class='icon_calendar'></i> Delivery Date</th>
  <th><i class='icon_mail_alt'></i> Delivery By </th>
  <th><i class='icon_pin_alt'></i> Delivery Note#</th>
 <th><i class='icon_mobile'></i> Devices </th>
 <th><i class='icon_mobile'></i> Reported Problem </th>
  <th><i class='icon_mobile'></i> Action </th>
 </tr>";

    while($deliveries = $stmt->fetch()) // loop and display data
    {

   //if($deliveries->{'warranty'} ==1) { echo "On warranty";}else{ echo "On contract";} 
  echo "<tr>";
  echo "<td>" . $deliveries->{'id'}. "</td>";
  echo "<td>" . $deliveries->{'client_id'}. "</td>";
  echo "<td>" . $deliveries->{'deliv_date'} . "</td>";
  echo "<td>" . $deliveries->{'deliv_by'} . "</td>";
  echo "<td>" . $deliveries->{'delivNote_No'} . "</td>";

  
  echo "<td>";
  $res = $dbc->query("SELECT * FROM brought_devices WHERE brought_devices.mst_deliveries_id='". $deliveries->{'id'}."' "); // fetch data WHERE mst_deliveries_id='6' WHERE brought_devices.mst_deliveries_id=mst_deliveries.id
    $res->setFetchMode(PDO::FETCH_OBJ);
   while($devices = $res->fetch()) // loop and display data
    {

  echo "<ul><li>" . $devices->{'device_id'} . "</li></ul>";
}//WHERE brought_devices.mst_deliveries_id='". $deliveries->{'id'}."'
echo "</td><td>";
$res1 = $dbc->query("SELECT * FROM brought_devices WHERE brought_devices.mst_deliveries_id='". $deliveries->{'id'}."'"); // fetch data
    $res1->setFetchMode(PDO::FETCH_OBJ);
  while($device = $res1->fetch()) // loop and display data
    {
  echo "<ul><li>" . $device->{'reported_problem'}. //"</li></ul>";
  // echo "<ul><li>" ;
  "<div class='btn-group'>";
    echo "<a  href='editDeviceDeliv.php?id=".$device->{'id'}."'> | Edit |</a>";
    
    echo   "<a  href='deldevdeliv.php?id=".$device->{'id'}."'> Del</a>";
      echo "</div>";
 echo  "</li></ul>";
   
    }

echo "</td><td>";
   echo "<div class='btn-group'>";
    echo "<a class='btn btn-primary' href='editDeliv.php?id=".$deliveries->{'id'}."'><i class='icon_check_alt2'></i></a>";
    
    echo   "<a class='btn btn-danger' href='deldeliv.php?id=".$deliveries->{'id'}."'><i class='icon_close_alt2'></i></a>";
      echo "</div>";
      echo "</td>";
  echo "</tr>";
    }

 
}
   echo "</table>";
   ?>
                      </section>
                  </div>
              </div>
              <!-- page end-->

</section>