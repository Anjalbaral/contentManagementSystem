<?php session_start(); ?>

<?php require_once("include/databaseConnection.php");?>
<?php require_once("include/functions.php"); ?>

<?php $blogname = null;
      $blogauthor = null;
      $blogtext = null;
      
 ?>
<?php 
if(isset($_POST["submit"]))
{
 //   $filenewname = null;
 // //this is file section
 //   $files=$_FILES['image'];
   
 //   $filename = $_FILES['image']['name'];
 //   $filetempname = $_FILES['image']['temp_name'];
 //   $filesize = $_FILES['image']['size'];
 //   $filetype = $_FILES['image']['type'];
 //   $fileerror = $_FILES['image']['error'];
   
 //   //explode will make an array of the filename and .
 //   $fileExtent = explode('.',$filename);
 //   $actualExt = strtolower(end($fileExtent));
 //   $allowed = array('jpg','png','gif','jpeg');

 //   if(in_array($actualExt, $allowed))
 //   {
 //    if($fileerror == 0)
 //    {
 //      if($filesize < 100000000)
 //      {
 //        $filenewname = uniqid('',true).'.'.$actualExt;
 //        $fileDestination = 'images/'.$filenewname;
 //        move_uploaded_file($fileTmpName,$fileDestination);
        
 //      }
 //      else
 //      {
 //        $_SESSION["filemsg"] = "file size is to large";
 //      }
 //    }
 //    else
 //    {
 //      $_SESSION["filemsg"] = "error occur during file uploading";
 //    }
 //   }
 //   else
 //   {
 //    $_SESSION["filemsg"] = "file size is not acceptedable";
 //   }

   //end of file section
   $blogname =secure_data_transfer ($_POST["blogname"]);
   $blogauthor = secure_data_transfer($_POST["author"]);
   $blogid = secure_data_transfer($_POST["blogId"]);
   $blogtext =nl2br(secure_data_transfer($_POST["blogtext"]));
   
   $query = "INSERT INTO blogdetails(name,blogDate) values('$blogname',curdate())";
   $query2 = "INSERT INTO blogcontent(blogid,blogtexts,author) VALUES('$blogid','$blogtext','$blogauthor')";

 if(!empty($blogname) && !empty($blogauthor) && !empty($blogid) && !empty($blogtext))
 {

 	   $result = mysqli_query($connection,$query);
 	   $result2 = mysqli_query($connection,$query2);
 	   if($result && $result2)
 	   {
 	   	   	   $_SESSION["MESSAGE"] = "successfully added";
 	   	   	   redirect_to("adminFirst.php");
 	   }  
 	   else
 	   {
 	   	echo mysqli_error($connection);
 	   }
 }
 else
 {
 	$_SESSION["message"] = "fields are blank";
 }
}
else
{
	$message = "this is freking cool";
}

 ?>


<?php 
$_SESSION["errorblank"]=null;
 $current_blog_subject = null;
 if(isset($_GET["content"]))
 {
 	$current_blog_subject = $_GET["content"];
 }
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>firstPageBlog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/blogCss.css">
    
    
</head>
<body>
 
  	<?php include("include/layout/header.php"); ?>

<div class="container-fluid bg-light" style="min-height: 600px;">
	<div class="row">
		 <div class="col-xs-3 col-sm-3 col-md-3" id="sideBar">
		 	<div class="container py-5">
		 		<h5><a  style="color: #999;text-decoration: none;" href="adminFirst.php" >&larr;Back</a></h5>
		 		<h4 style="color:#999">Add Blog</h4>
		 		
		 	</div>
		 </div>
		 <div class="col-xs-9 col-sm-9 col-md-9"> 
		 	
		 	<div class="row">
                
            <div  class="container text-center">
            	<div <?php if(isset($_SESSION["message"])) { echo "id=\"alertmsg\""; } ?> class="mx-auto my-4" style="">
            	<h6 class="text-danger" >
            	<?php if(isset($_SESSION["message"])){echo $_SESSION["message"];} ?>
               </h6>
               </div>
            </div>
		 		<div class="col-6 mx-auto">
		 	<form method="post" action="newBlog.php" class="form-horizontal">
		 		<label for="blogname">Blog Name:</label>
		 		<input class="form-control" type="text" value="<?php echo $blogname ?>" name="blogname">
		 		<label for="blogname">Author:</label>
		 		<input class="form-control" type="text" value="<?php echo $blogauthor ?>" name="author">
		 		<label for="blogId">Choose Blog Id : (Mostly choose last one)</label>
                <select name="blogId" class="form-control">
                	<?php 
                            $subject_set = find_all_blogDetails();
                            $subject_count= mysqli_num_rows($subject_set);
                            for($count=1;$count<=($subject_count+1);$count++)
                            {
                                echo "<option value = \"{$count}\">{$count}</option>";
                            }
                             ?>
                </select>
         <label>Image:</label>
         <input type="file" name="image" class="form-control" />
		 		<label for="blogname">Write blog:</label>
		 		<textarea class="form-control" vlaue="<?php echo $blogtext ?>" name="blogtext" rows="7" id="blogtext"></textarea>
                <br>
		 		<input type="submit" name="submit" class="btn btn-primary">
		 	</form>
		 </div>
		</div>
	</div>  
</div>
</div>


<?php include("include/layout/footer.php"); ?>
 
 
</body>
</html>