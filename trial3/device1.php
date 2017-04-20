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
             <form action="addDevice1.php" method="POST">
 <b>Device Details:</b>
    
 <?php 
   include 'db.php';
   $rowid = "SELECT MAX(id) FROM devices ";
    $res=mysql_query($rowid) or die('wrong query');
     while($row=mysql_fetch_array($res))
            {$id=$row['MAX(id)']+1;
                //echo $id;
            }?>
 <input name="id" id="id" type="text" value="<?php echo $id;?>">
 <label>Device Number :<span>*</span></label>
 <input name="device_No" id="device_No" type="text" size="30" required>
 <label>Firmwire :<span>*</span></label>
 <input name="firmwire" id="firmwire" type="text" size="30" required>
 <label>Version :<span>*</span></label>
 <input name="version" id="version" type="text" size="30" required>
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