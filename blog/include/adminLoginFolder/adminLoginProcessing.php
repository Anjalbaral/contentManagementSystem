<?php session_start(); ?>
<?php require_once("../databaseConnection.php");?>
<?php require_once("../functions.php");?>
<?php
$_SESSION["message"]=null;
if(isset($_POST['submit']))
{
$admin_name=mysqli_real_escape_string($connection,$_POST['username']);
$admin_pass=md5(mysqli_real_escape_string($connection,$_POST['pass']));

  if(empty($admin_name) || empty($admin_pass))
  {
    $_SESSION['message'] = "fill proporly";
    redirect_to('adminLogin.php');
  }
 else{
    $sql="SELECT * FROM adminvalid WHERE adminname='".$admin_name."' AND adminpassword='".$admin_pass."'";
    $result=mysqli_query($connection,$sql);
     
    if(mysqli_num_rows($result)<1)
        {
        $_SESSION['message']="unvalid data";
        redirect_to('adminLogin.php');
        }
        else
        {
          $_SESSION['message'] = "success";
          redirect_to('../../adminFirst.php');
        }
     }
  }
  else
  {
  	$_SESSION["message"] = "give required details";
  	redirect_to('adminLogin.php');
  }