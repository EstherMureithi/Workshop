<?php
  include 'includes/master.html';
  include 'connect.php';

?>

<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Clients</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-bars"></i>Clients</li>
						<li><i class="fa fa-square-o"></i>Manage</li>
					</ol>
				</div>
			</div>
	<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Client Listing 

                          </header><br>
                          <a class='btn btn-success' href='cl.php'> <i class='icon_plus_alt2'></i> ADD </a><br>
                          
                          <?php
$print = ""; // assign an empty string 

$stmt = $dbc->query("SELECT * FROM clients"); // fetch data
$stmt->setFetchMode(PDO::FETCH_OBJ);

if($stmt->execute() <> 0)
{

    echo "<table class='table table-stripped'>
<tr>
<th>#</th>
<th>Company Name</th>
<th>Contact Person</th>
<th>Primary Contact</th>
<th>Alternative Contact</th>
<th>Address</th>
<th>Agreement</th>
<th>Action</th>
</tr>";

    while($clients = $stmt->fetch()) // loop and display data
    {

  echo "<tr>";
  echo "<td>" . $clients->{'id'}. "</td>";
  echo "<td>" . $clients->{'companyName'} . "</td>";
  echo "<td>" . $clients->{'contactPerson'} . "</td>";
  echo "<td>" . $clients->{'contact_pry'} . "</td>";
  echo "<td>" . $clients->{'contact_alt'} . "</td>";
  echo "<td>" . $clients->{'address'}. "</td>";
  echo "<td>". $clients->{'agreement_policy'}. "</td>";
   echo "<td>";
   echo "<div class='btn-group'>";
    echo "<a class='btn btn-primary' href='editClient.php?id=".$clients->{'id'}."'><i class='icon_check_alt2'></i></a>";
    
    echo   "<a class='btn btn-danger' href='delClient.php?id=".$clients->{'id'}."'><i class='icon_close_alt2'></i></a>";
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