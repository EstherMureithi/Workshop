<?php
   include 'includes/master.html';
?>
 <head>
 <title>ODS || Deliveries</title>
 <link rel="stylesheet" href="style.css" />
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>
  $(document).ready(function() {
    $("#deliv_date").datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>
 </head>

<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Deliveries</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li> 
						<li><i class="fa fa-bars"></i>Deliveries</li>
						<li><i class="fa fa-square-o"></i>Manage</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                
                  <div class="col-lg-12">
                      <section class="panel">
                          
                          <div class="container">
                 <div class="main">
                  <h2>Create Delivery</h2>
                     <?php     
            if (!empty($_SESSION['error'])) {
      echo $_SESSION['error'];
      unset($_SESSION['error']);
 }
 ?>
 </span>
 <form action="createDeliv2.php" method="post">

  <?php 
  $link=mysql_connect("localhost","root","") or die("cant connect");
      
   mysql_select_db("workshop",$link) or die("cant select db");
   $rowid = "SELECT MAX(id) FROM masterdeliv ";
    $res=mysql_query($rowid,$link) or die('wrong query');
     while($row=mysql_fetch_array($res))
            {$id=$row['MAX(id)']+1;
                //echo $id;
            }?>
 <input name="id" id="id" type="text" value="<?php echo $id;?>">

 <label>Client :<span>*</span></label>
 <select name="client_id"> <?php
                              
            $link=mysql_connect("localhost","root","") or die("cant connect");
      
            mysql_select_db("workshop",$link) or die("cant select db");
  
            $q="select * from clients";
  
            $res=mysql_query($q,$link) or die('wrong query');
  
            while($row=mysql_fetch_assoc($res))
            {
              echo "<option>".$row['id']." ".$row['companyName'];
            }
            ?>
 </select>
 <br>
 <label>Delivery Date :<span>*</span></label>
 <br>
    <input type="text" id="deliv_date" name="deliv_date">
 <input type="reset" value="Reset" />
 <input type="submit" value="Next" />
 </form>
 </div>
 </div>
</section>
 </div>
 </div>
 <?php
   //include 'includes/scripts.html';
 ?>


 </body>