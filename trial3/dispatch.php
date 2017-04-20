<?php
include 'includes/master.html';
include 'connect.php';
?>
<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Dispatch</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-bars"></i>Dispatch</li>
						<li><i class="fa fa-square-o"></i>Manage</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Dispatch Listing
                          </header><br>

                            <a class='btn btn-success' href='createDisp.php'> <i class='icon_plus_alt2'></i> ADD </a><br>
                      <?php
                      $stmt = $dbc->query("SELECT * FROM masterdisp"); // fetch data
                             $stmt->setFetchMode(PDO::FETCH_OBJ);

                             if($stmt->execute() <> 0)
                             {

                               echo "<table class='table table-stripped'>
                                       <thead>
                            <tr >
                              <th>#</th>
                           <th><i class='icon_profile'></i> Dispatch By</th>
                           <th><i class='icon_profile'></i> Delivery #</th>
                           <th><i class='icon_calendar'></i> Date Dispatched</th>
                           <th><i class='icon_money'></i> Invoice #</th>
                           <th><i class='icon_profile'></i>Device</th>
                           <th><i class='icon_profile'></i> Diagnosis </th>
                           <th><i class='icon_profile'></i>Action</th>
                           </tr>
                           </thead>";

                           while ($dispatch = $stmt->fetch()) {
                             echo "<tbody>";
                             echo "<tr>";
                             echo "<td>" . $dispatch->{'id'}. "</td>";
                             echo "<td>" . $dispatch->{'dispatch_by'} . "</td>";
                             echo "<td>" . $dispatch->{'mst_deliveries_id'} . "</td>";
                             echo "<td>" . $dispatch->{'disp_date'} . "</td>";
                             echo "<td>" . $dispatch->{'invoice_no'} . "</td>";

                            
                             $res = $dbc->query("SELECT * FROM det_dispatch WHERE det_dispatch.mst_dispatch_id='". $dispatch->{'id'}."' "); // fetch data  where mst_dispatch_id = '". $dispatch->{'id'}."'
                             $res->setFetchMode(PDO::FETCH_OBJ);
                           echo "<td>";

                             while ($devices = $res->fetch()) {
                               
                               echo "<ul><li>" .$devices->{'device_id'}. "</li></ul>";
                             }
                             $res1= $dbc->query("SELECT * FROM det_dispatch WHERE det_dispatch.mst_dispatch_id='". $dispatch->{'id'}."' "); // fetch data
                             $res1->setFetchMode(PDO::FETCH_OBJ);
                             echo "</td><td>" ;
                             while ($device=$res1->fetch()) {
                              echo "<ul><li>".$device->{'parts_replaced'} ;

                              "<div class='btn-group'>";
                               echo "<a  href='editDeviceDisp.php?id=".$device->{'id'}."'> | Edit |</a>";
    
                               echo   "<a  href='delClient.php?id=".$device->{'id'}."'> Del</a>";
                                 echo "</div>";
                            echo  "</li></ul>";
                             }
                             echo "</td><td>";
                              echo "<div class='btn-group'>";
                               echo "<a class='btn btn-primary' href='editDisp.php?id=".$dispatch->{'id'}."'><i class='fa fa-edit'></i></a>";
                               echo   "<a class='btn btn-success' href='showDispatch.php?id=".$dispatch->{'id'}."'><i class='icon_check_alt2'></i></a>";
                               echo   "<a class='btn btn-danger' href='delClient.php?id=".$dispatch->{'id'}."'><i class='icon_close_alt2'></i></a>";
                                 echo "</div>";
                                 echo "</td>";
                             echo "</tr>";
                           }
                         }
                           echo "</tbody></table>";
                      ?>
                          
                              
                           
                        
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>