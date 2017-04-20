<?php
  include 'includes/master.html';
  include 'connect.php';

?>

<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa fa-bars"></i> devices</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-bars"></i>devices</li>
            <li><i class="fa fa-square-o"></i>Manage</li>
          </ol>
        </div>
      </div>
  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             device Listing 

                          </header><br>
                          <a class='btn btn-success' href='device1.php'> <i class='icon_plus_alt2'></i> ADD </a><br>
                          
                          <?php
$print = ""; // assign an empty string 

$stmt = $dbc->query("SELECT * FROM devices"); // fetch data
$stmt->setFetchMode(PDO::FETCH_OBJ);
/*
if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM devices WHERE id=".$_GET['delete_id'];
 mysql_query($sql_query);
 header("Location: devices.php");
}
*/
 if (isset($_GET['del'])) {
$del = $_GET['del'];
//SQL query for deletion.
$query1 = mysql_query("delete from devices where id=$del");
}

if($stmt->execute() <> 0)
{

    echo "<table class='table table-stripped'>
<tr>
<th>#</th>
<th>Device Number </th>
 <th>Firmwire</th>
 <th>Version</th>
 <th>Type</th>
 <th>Action</th>
</tr>";

    while($devices = $stmt->fetch()) // loop and display data
    {

   //if($devices->{'warranty'} ==1) { echo "On warranty";}else{ echo "On contract";} 
  echo "<tr>";
  echo "<td>" . $devices->{'id'}. "</td>";
  echo "<td>" . $devices->{'device_No'}. "</td>";
  echo "<td>" . $devices->{'firmwire'} . "</td>";
  echo "<td>" . $devices->{'version'} . "</td>";
  echo "<td>" . $devices->{'type'} . "</td>";
   echo "<td>";
   echo "<div class='btn-group'>";
    echo "<a class='btn btn-primary' href='editDevice1.php?id=".$devices->{'id'}."'><i class='icon_check_alt2'></i></a>";
   // echo "<input onclick='return myConfirm' type='submit' value='Delete'/>";
    //echo "<input onclick='return myConfirm();' type='submit' name='deleteDevice' value='Delete' class='btn btn-danger'"
   echo   "<a class='btn btn-danger' href='deldev.php?id=".$devices->{'id'}."'><i class='icon_close_alt2'></i></a>";
      echo "</div>";
      echo "</td>";
  echo "</tr>";
    }
}
   echo "</table>";
   ?>
                      </section>
          <script type="text/javascript">
           function myConfirm(id)
{
 if(confirm('Sure To Remove This Record ?'))
 {
  window.location.href='devices.php?del=".$devices->{'id'}."';
  <?php
    echo "<script>";
  ?>
 }
}
          </script>
                  </div>
              </div>
              <!-- page end-->

</section>