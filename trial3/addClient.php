<?php
  //include 'db.php';
  include 'includes/master.html';
?>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Clients</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-bars"></i>Clients</li>
						<li><i class="fa fa-square-o"></i>Edit</li>
					</ol>
				</div>
			</div>
                   <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Client Listing 
                             </header><br>
                        <div class="container">
                         <div class="main">

                     <form action="clientAdd.php" method="POST">
                      <?php
                      $rowid = "SELECT MAX(id) FROM clients ";
                $res=mysql_query($rowid) or die('wrong query');
                 while($row=mysql_fetch_array($res))
            {$id=$row['MAX(id)']+1;
                //echo $id;
            }?>
           <input name="id" id="id" type="text" value="<?php echo $id;?>">
                     <div class="col-sm-6">
                    	<label>Company Name </label>
                       <input type="text" id="companyName" class="form-control" required>
                        </div>
                      <br>
                     <div class="col-sm-6">
                     	<label>Contact Person</label>
                       <input type="text" id="contactPerson" class="form-control" required>
                          </div>
                       <br>
                      <div class="col-sm-6">
                     	 <label>Primary Contact</label>
                       <input type="text" id="contact_pry" class="form-control" required>
                           </div>
                      <br>
                      <div class="col-sm-6">
                     	 <label>Alternate Contact</label>
                       <input type="text" id="contact_alt" class="form-control" required>
                          </div>
                     
                     <div class="col-sm-6">
                     	 <label>Address</label>
                       <input type="text" id="address" class="form-control" required>
                            </div><br>
                       
                     <div class="col-lg-4">
                     	<label>
                       <input type="checkbox" id="warranty" value="yes" >On warranty</label>
                                              </div><br><br>

                     </br>
                     <input name="submit" type="submit" value="add" >

                 </form>
               </div>
               </div>
             </section>
              </div>
         </section>
          

