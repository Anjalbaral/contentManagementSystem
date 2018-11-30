<?php require_once("include/databaseConnection.php");?>
<?php require_once("include/functions.php"); ?>
<?php $contentId=$_GET["content"] ?>
<?php 
  $blogname =secure_data_transfer ($_POST["blogname"]);
   $blogauthor = secure_data_transfer($_POST["author"]);
   
   $blogtext = secure_data_transfer($_POST["blogtext"]);

if(isset($_POST["submit"]))
{
  $firstone = update_the_blogDetails($contentId,$blogname);
  $secondone = update_the_blogContent($contentId,$blogauthor,$blogtext);
   echo mysqli_error($connection);
   
	if($firstone && $secondone)
	{
	  $_SESSION["updated"]="succesfully updated";
	  redirect_to("adminFirst.php?content=$contentId");	
	}
	else
	{
		echo "failed";
	}

}
else
{
 redirect_to("editContent.php?content= $contentId");
}
// else
// {
// 	$_SESSION["message"] = "first submit the form";
// 	echo $_SESSION["message"];
// 	redirect_to("editContent.php?content= $contentId");
// }


 ?>