<?php session_start(); ?>
<?php require_once("../databaseConnection.php");?>
<?php require_once("../functions.php");?>
<!-- <?php //echo md5("password"); ?> -->
<!DOCTYPE html>
<html>
<head>
	<title>admin logins</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
</head>
<body>
  <div class="container-fluid bg-light" style="height:700px;width:100%;">
  	<div class="row"><div class="col-12 text-center"><h5 class="text-danger"></h5></div></div>
  		<div class="row py-4">
  		<div  class="col-sm-1 col-md-4"></div>
  		<div class="col-sm-10 col-md-3 bg-dark py-5 text-center" style="color: white;">
           <p><?php if(isset($_SESSION['message']))
              { echo $_SESSION['message'] ;}
              ?></p>
  			<img src="../../../../images/grapLOGO.png" height="100px" width="100px">
  		    <form class="form-horizontal" action="adminLoginProcessing.php" method="post">
  			<label for="username">Admin Name:</label>
  			<input type="text" name="username" class="form-control">
  			<br>
  			<label for="password">Password:</label>
  			<input type="password" name="pass" class="form-control">
  			<input type="submit" class="btn btn-primary my-3" name="submit" value="login">
  		</form>
  	    </div>
  		<div  class="col-sm-1 col-md-3"></div>
  	</div>
  
</div>
</body>
<?php session_destroy(); ?>
</html>