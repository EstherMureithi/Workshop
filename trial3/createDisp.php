<?php
   include 'includes/master.html';
?>
 <head>
 <title>ODS || Dispatch</title>
 <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>
  $(document).ready(function() {
    $("#disp_date").datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>
 </head>
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
                          <header class="panel-head ing">
                              Create a dispatch
                          </header><br>
                     <?php     
            if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 unset($_SESSION['error']);
 }
 ?>
 </span>
 <form action="createDisp2.php" method="post">
  <?php $link=mysql_connect("localhost","root","") or die("cant connect");
      
   mysql_select_db("workshop",$link) or die("cant select db");
   $rowid = "SELECT MAX(id) FROM masterdisp ";
    $res=mysql_query($rowid,$link) or die('wrong query');
     while($row=mysql_fetch_array($res))
            {$id=$row['MAX(id)']+1;
                //echo $id;
            }?>
 <input name="id" id="id" type="text" value="<?php echo $id;?>">
<label>Dispatch by: </label>
 <select name="dispatch_by">
     <option value="">Choose...</option> 
     <?php
                              
            $link=mysql_connect("localhost","root","") or die("cant connect");
      
            mysql_select_db("workshop",$link) or die("cant select db");
  
            $q="select * from employees";
  
            $res=mysql_query($q,$link) or die('wrong query');
  
            while($row=mysql_fetch_assoc($res))
            {
              echo "<option>".$row['id']." " .$row['emp_name'];
            }
            ?>
 </select>
 <label>Delivery Number :<span>*</span></label>
 <select name="mst_deliveries_id"> 
  <option value="">Note Number...</option>
  <?php
                              
            $link=mysql_connect("localhost","root","") or die("cant connect");
      
            mysql_select_db("workshop",$link) or die("cant select db");
  
            $q="select * from masterdeliv";
  
            $res=mysql_query($q,$link) or die('wrong query');
  
            while($row=mysql_fetch_assoc($res))
            {
              echo "<option>".$row['id'] ;
            }
            ?>
 </select>
 <label>Dispatch Date :<span>*</span></label>
 <input name="disp_date" id="disp_date" type="text" placeholder="Date" required>
 
  <label>Invoice Number :<span>*</span></label>
 <input name="invoice_no" type="text"  required>

 <label>Number of Devices </label>
 <input name="number" type="text" required>
 <input type="reset" value="Reset" />
 <input type="submit" value="Next" />
 </form>
 </div>
 </div>
 </div>
 </body>