<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="invoice.css">
	<title></title>

</head>
<body>
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
            <li><i class="fa fa-square-o"></i>View Dispatch</li>
          </ol>
        </div>
      </div>

    <?php 
   

     /*
    $query = ("SELECT 'brought_devices.device_id', 'brought_devices.reported_problem', 'mst_deliveries.deliv_date', 'mst_dispatch.invoice_No', 'det_dispatch.parts_replaced' 
        FROM mst_deliveries INNER JOIN brought_devices ON 'mst_deliveries.id' = 'brought_devices.mst_deliveries_id' 
        INNER JOIN mst_dispatch ON 'mst_deliveries.id' = 'mst_dispatch.mst_deliveries_id' 
        INNER JOIN det_dispatch ON 'mst_dispatch.id' = 'det_dispatch.mst_dispatch_id' WHERE 'mst_dispatch.id'=$id");
        */
    ?>
<section class="panel">
	<div class="container">
		<div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <b>OCTAGON DATA SYSTEMS</b>
            <small class="pull-right">Date: 2/10/2014</small>
          </h2>
        </div>
		<div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Octagon Data Systems</strong><br>
            Nyaku House, 2nd Floor<br>
            Hurlingum,Nairobi<br>
            Phone: 078903839<br>
            Email: info@otagon.com
          </address>
        </div>
        <!-- /.col -->
        <?php
             
         //$stmt = $dbc->query("SELECT * FROM clients,masterdisp WHERE clients.id=masterdeliv"); // fetch data
         //$stmt->setFetchMode(PDO::FETCH_OBJ);

        
        ?>
       
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <?php
          $dispatch_id=$_GET['id'];

          $query=mysql_query(" SELECT * FROM masterdisp WHERE id=$dispatch_id ");
          $res = mysql_fetch_array($query);
            if($query){
              $id=$res['id'];
               $mst_deliveries_id=$res['mst_deliveries_id'];
                $invoice_no=$res['invoice_no'];
                 $disp_date=$res['disp_date'];
            }
          $query1=mysql_query("SELECT masterdeliv.delivNote_No,masterdeliv.deliv_date,clients.companyName,clients.contactPerson,clients.contact_pry,clients.address FROM masterdeliv,clients 
            WHERE masterdeliv.client_id=clients.id");
          $ress = mysql_fetch_array($query1);
          if ($query1) {
            $deliv_date = $ress['deliv_date'];
            $delivNote_No = $ress['delivNote_No'];
            $companyName = $ress['companyName'];
            $contactPerson = $ress['contactPerson'];
            $contact_pry = $ress['contact_pry'];
            $address = $ress['address'];

          }else{
            echo "Error loading data";
          }

          
        

          ?>
          Delivery Note Number:<b><?php echo "$delivNote_No";?> </b><br>
          Invoice Number:<b><?php echo "$invoice_no";?> </b><br>
          Payment Due: <b><?php echo "$disp_date";?> </b><br>
          Delivery Date: <b><?php echo "$deliv_date";?> </b><br>
          <?php

          ?>
        </div>
        <!-- /.col -->
        <?php

        ?>
         <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo "$companyName";?></strong><br>
            Address Location: </b> <?php echo "$address";?><br>
            Contact Person: </b> <?php echo "$contactPerson";?><br>
            Phone(+254): </b> <?php echo "$contact_pry";?><br>
           
          </address>
        </div>
      </div>

            <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">

          <?php 
          
            //$stmt = $dbc->query("SELECT brought_devices.device_id,brought_devices.reported_problem,det_dispatch.parts_replaced FROM brought_devices,det_dispatch 
            //WHERE brought_devices.device_id=det_dispatch.device_id AND det_dispatch.mst_dispatch_id=$dispatch_id"); // fetch data
            $q= $dbc->query("SELECT device_id,parts_replaced FROM det_dispatch WHERE mst_dispatch_id=$id");
            $q->setFetchMode(PDO::FETCH_OBJ);
           
            
            if($q->execute() <> 0)
            {
            echo "<table class='table table-stripped'>
            <thead>
            <tr>
              <th>Device Number</th>
              <th>Reported Problem</th>
              <th>Diagnosis</th>
              
            </tr>
            </thead>";
              
            while ($dev = $q->fetch()){
              echo "<body>";
              echo "<tr>";
              echo 
               "<td>smh</td>";
               "<td>". $dev->{'parts_replaced'}. "</td>";
               echo "</tr>";
               }
             
            
                 /*

             $que= $dbc->query("SELECT reported_problem FROM brought_devices WHERE device_id= '".$dev->{'device_id'}."' ");
            $que->setFetchMode(PDO::FETCH_OBJ);
             while ($det=$que->fetch()) {
              "<td>". $det->{'reported_problem'}. "</td>";
              $quee= $dbc->query("SELECT parts_replaced FROM det_dispatch WHERE mst_dispatch_id=$id");
            $quee->setFetchMode(PDO::FETCH_OBJ);
            
             while ($dett=$quee->fetch()) {
              "<td>". $dett->{'parts_replaced'}. "</td>";
              */
            
          

          }
          echo "</body>";
          echo "</table>";
        
          ?>
          
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <footer>
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="dispatch-print.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>

      </div>
   </footer>
	</div>
 
   </section>
 </section>
</body>
</html>