<?php
  include 'includes/master.html';
  include 'connect.php';

  $id =$_REQUEST['id'];

$result = mysql_query("SELECT * FROM devices WHERE id  = '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
    {
    die("Error: Data not found..");
    }
        $id=$test['id'] ;
      

?>


?>

<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa fa-bars"></i> devices</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-bars"></i>devices</li>
            <li><i class="fa fa-square-o"></i>Manage</li>
          </ol>
        </div>
      </div>
  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">


                          <header class="panel-heading">
              </header>
              <form action="deldevexec.php" method="post">
                             <p>Are you sure you want to delete?</p> 

                              <p align="center">
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="submit" name="ok" value="Delete">
                            &nbsp;&nbsp;
                            <a href="devices.php"> Back</a>
                            </form>

                                               </div>
       </div>