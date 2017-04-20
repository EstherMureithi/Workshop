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
          <h3 class="page-header"><i class="fa fa fa-bars"></i> Clients</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
            <li><i class="fa fa-bars"></i>Clients</li>
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
                  <h2>Add client</h2>
             <form name="clientForm" action="clientAdd.php" onsubmit="return validateForm()" method="POST">
    
 <?php
      include 'db.php';
   $rowid = "SELECT MAX(id) FROM clients ";
    $res=mysql_query($rowid) or die('wrong query');
     while($row=mysql_fetch_array($res))
            {$id=$row['MAX(id)']+1;
                //echo $id;
            }?>
 <input name="id" id="id" type="text" value="<?php echo $id;?>">
 <label>Company Name :<span>*</span></label>
 <input name="companyName" id="companyName" type="text" size="30" required>
 <label>Contact Person :<span>*</span></label>
 <input name="contactPerson" id="contactPerson" type="text" size="30" required>
 <label>Primary Contact(+254) :<span>*</span></label>
 <input name="contact_pry" id="contact_pry" type="text" size="30" onkeypress="return isNumberKey(event);" required>
 <label>Alternate Contact(+254) :<span>*</span></label>
 <input name="contact_alt" id="contact_alt" type="text" size="30" onkeypress="return isNumberKey(event);" required>
 <label>Address :<span>*</span></label>
 <input name="address" id="address" type="text" size="30" required>
 <label>Agreement Policy :<span>*</span></label>
 <select id="agreement_policy" name="agreement_policy">
  <option value="">Choose...</option>
  <option value="warranty">On warranty</option>
  <option value="contract">On contract</option>
 </select>
 <input type="reset" value="Reset" />
 <input name="submit" type="submit" value="Submit" />
 </form>
       </div>
</div>
      </section>
 </div>
 <script type="text/javascript">
 function vadlidateForm(){
  var x = document.forms['clientForm']['address'].value;
  if (x=="") {
    alert('Address must be filled out!');
     return false;
  }

 }
 </script>
</div>
</section>