<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login Page </title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />


</head>
<?php
 if(isset($_POST['submitted'])) {
 
require_once('dbcon.php');

$errors = array();

if(empty($_POST['username'])){
$errors [] = 'Please enter username!';
}else{
$us = trim($_POST['username']);
}

if(empty($_POST['password'])) {
$errors [] = 'Please enter the password!';
}else{
$p = trim($_POST['password']);
}

if(empty($errors)){

$query = "SELECT id,username,password,name,active FROM users WHERE username = '$us' AND password ='$p'";
$result = @mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_NUM);
if($row){

session_start();
 $_SESSION['id'] = $row[0];
$_SESSION['name'] = $row[3];
$_SESSION['active'] = $row[4];

ob_end_clean();
if ($row[4] == '1'){
 echo '<script>windows: location="home.php"</script>';
}

else{
header ("location: index.php?err");
}
//header("Location: $url");
exit();
}

else{
//echo "<font color=red><center><b>Incorrect UserName or Password!</b></center></font>";
header ("location: index.php?err");

}
}
mysql_close();

}//End submitted
?>


  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" method="post" action="index.php" id="frm">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="input-group">
            <input type="hidden" name="submitted" value="TRUE"></td>
        </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="Login" name="ok">Login</button>
            <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>
        </div>
      </form>
      <?php if(isset($_GET['err'])){
    echo "<script>alert('Invalid Username or Password')</script>";
    } ?>
    <div class="text-right">
            
        </div>
    </div>


  </body>
</html>
