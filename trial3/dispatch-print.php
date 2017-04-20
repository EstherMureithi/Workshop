<?php
include 'db.php';
include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="invoice.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content= "Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
  </head>
	<title>Dispatch-Print</title>

</head>
<body>
	
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
          
            $stmt = $dbc->query("SELECT DISTINCT brought_devices.device_id,brought_devices.reported_problem,det_dispatch.parts_replaced FROM brought_devices,det_dispatch 
            WHERE brought_devices.device_id=det_dispatch.device_id AND det_dispatch.mst_dispatch_id=$id"); // fetch data
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            if($stmt->execute() <> 0)
            {
            echo "<table class='table table-stripped'>
            <thead>
            <tr>
              <th>Device Number</th>
              <th>Reported Problem</th>
              <th>Diagnosis</th>
              
            </tr>
            </thead>";

            while ($dev=$stmt->fetch()) {
              echo "<tr>";
              echo 
              "<td>". $dev->{'det_dispatch.device_id'}. "</td>";
              "<td>". $dev->{'brought_devices.reported_problem'}. "</td>";
              "<td>". $dev->{'parts_replaced'}. "</td>";
            }
          }
           ?>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>

	</div>
 
   </section>
 </section>
</body>
</html>