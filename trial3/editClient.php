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
          <h3 class="page-header"><i class="fa fa fa-bars"></i> clients</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-bars"></i>clients</li>
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
                  <h2>Edit Client</h2>

                  <?php
  include 'db.php';
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    if (isset($_POST['submit'])) {
      $companyName=$_POST['companyName'] ;
          $contactPerson= $_POST['contactPerson'] ;         
          $contact_pry=$_POST['contact_pry'] ;
          $contact_alt=$_POST['contact_alt'] ;
    $query3=mysql_query("UPDATE clients set companyName ='$companyName',
     contactPerson ='$contactPerson', contact_pry='$contact_pry', contact_alt='$contact_alt' WHERE id = '$id'");

    if ($query3) {
      header('location:clients.php');
    }
  
    }
  }
  
  $query1=mysql_query("select * from clients where id=$id");
  $query2=mysql_fetch_array($query1);
  ?>

             <form action="" method="POST">
 
 <input name="id" id="id" type="hidden" value="<?php echo $query2['id']; ?>"/><br/>
 <label>Device Number :<span>*</span></label>
 <input name="companyName" id="companyName" type="text" required value="<?php echo $query2['companyName']; ?>" /><br /> 
 <label>Contact Person :<span>*</span></label>
 <input name="contactPerson" id="contactPerson" type="text" value="<?php echo $query2['contactPerson']; ?>" required>
 <label>Primary Contact :<span>*</span></label>
 <input name="contact_pry" id="contact_pry" type="text" value="<?php echo $query2['contact_pry']; ?>"required>
 <label>Alternative contact :<span>*</span></label>
 <input name="contact_alt" id="contact_alt" type="text" value="<?php echo $query2['contact_alt']; ?>"required>
 <label>Address :<span>*</span></label>
 <input name="address" id="address" type="text" value="<?php echo $query2['address']; ?>"required>
<label>Agreement Policy :<span>*</span></label>
<select name="agreement_policy">
  <option value="">Terms...</option>
  <option value="contract">On contract</option>
  <option value="warranty">On warranty</option>
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