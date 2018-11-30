
<?php session_start(); ?>
<?php require_once("include/databaseConnection.php");?>
<?php require_once("include/functions.php"); ?>
<?php 
 
if(isset($_POST["submit"]))
{
	$bname = secure_data_transfer($_POST["blogname"]);
	$bauthor = secure_data_transfer($_POST["author"]);
	$bid =secure_data_transfer($_POST["blogId"]);
	$text =secure_data_transfer($_POST["blogtext"]);

	// $query1 = "INSERT INTO blogdetails(name,blogDate) values({$bname},{NOW()})";

	$query2 = "INSERT INTO blogcontent(blogid,blogtexts,author) values({$bid},{$text},{$bauthor})";

    // check_query($query1);
    check_query($query2);
    
    

    if($bname == null || $bauthor==null || $bid=null || $text== null )
    {
    	
    	$_SESSION["message"]="fields cant be blank";
    	redirect_to("newBlog.php");
    }
    else
    {
    	// $result1 = mysqli_query($connection,$query1);
        $result2 = mysqli_query($connection,$query2);
    	$SESSION["message"] = "this is an success message";
    	redirect_to("adminFirst.php?error=1");
    }
 
}
else
{
	$_SESSION["notSubmitted"] = "this is fucking shit";
	redirect_to("newBlog.php");
}

	

	//checking the validations for form
	// if(!empty($bname) && !empty($bauthor) && !empty($bid) && !empty($text));
	// {
	//     $result1=mysqli_query($connection,$query1);
	//     $result2=mysqli_query($connection,$query2); 
	// 		if($result1 && $)
	// 		{
	// 	      $_SESSION["message"]= "you successfully created the Blog";
	// 	  	redirect_to("adminFirst.php");
	// 		}  else { die("query cannot run");}

 //     } 
     // else{
     // 	redirect_to("newBlog.php");
     // }  


 ?>
 
 
 