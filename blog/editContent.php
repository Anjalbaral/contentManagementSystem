<?php session_start(); ?>
<?php require_once("include/databaseConnection.php");?>
<?php require_once("include/functions.php"); ?>
<?php
 $current_blog_subject = null;
 if(isset($_POST["edit"]) && isset($_GET["content"] ))
 {
 	$current_blog_subject = secure_data_transfer($_GET["content"]);
 }
 elseif(isset($_POST["delete"]) && isset($_GET["content"]))
 {
 	
 	$current_blog_subject = secure_data_transfer($_GET["content"]);
 	$first = delete_blogContent_by_id($current_blog_subject);
 	$second = delete_blogDetails_by_id($current_blog_subject);

 	if($first && $second)
 	{
 		$_SESSION["deleted"]="succfully deleted";
 		redirect_to("adminFirst.php");
 	}
 	// redirect_to("deleteContent.php?content=$current_blog_subject");
 }
 else
 {
 	redirect_to("adminFirst.php");
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
    
    <style type="text/css">
      .addlink
      {
      color:#999;
      text-decoration:none;	
      }
    	.addlink:hover
    	{
    		text-decoration:none;
          color: #555;
    	}
    </style>
</head>
<body>
 
  	<?php include("include/layout/header.php"); ?>

<div class="container-fluid bg-light" style="min-height: 600px;">
	<div class="row">
		 <div class="col-xs-3 col-sm-3 col-md-3" id="sideBar">
		 	<div class="container py-5">
		 		
		 		<h4 style="color:#999">Edit blog</h4>
		 		<ol class="contents">
                
		 			<?php  $blogDetails = find_present_blogDetails($current_blog_subject);
                        $blogContent=find_blogcontent_by_subjectid($current_blog_subject);
		 			 ?>

		 			<?php 

		 			while($subject = mysqli_fetch_assoc($blogDetails))
		 			{ ?>
		 			
		 			<?php
                     echo "<li ";
                     if($subject["id"] == $current_blog_subject)
                     {echo "class=\"selected\"";}
                     echo ">";
                     ?>
		 				<a href="adminFirst.php?content=<?php echo urlencode($subject["id"]) ?>">
		 					<?php echo $subject["name"]; ?>
		 				</a>
		 				 <br>
		 				 <label>Posted on-</label>
		 				<small><?php echo $subject["blogDate"]; ?></small>
		 			</li>
		 			
		 		</ol>
		 	</div>
		 </div>
		 <div class="col-xs-9 col-sm-9 col-md-9"> 
		 	<div class="container">
		 		<h4>Edit : <?php echo $subject["name"] ?></h4>
		 		
	       </div>
	       <div class="container">
	       	<form method="POST" action="editFormProcess.php?content=<?php echo $current_blog_subject ?>" class="form-horizontal">
		 		<label for="blogname">Blog Name:</label>
		 		<input class="form-control" type="text" value="<?php echo $subject["name"]?>" name="blogname">
		 		<label for="blogname">Author:</label>
		 		<input class="form-control" type="text" value="<?php echo $blogContent["author"] ?>" name="author">

		 		<label for="blogname">Write blog:</label>
		 		<textarea class="form-control"  name="blogtext" rows="7" id="blogtext"><?php echo $blogContent["blogtexts"]; ?></textarea>
                <br>
		 		<input type="submit" value="Change" name="submit" class="btn btn-primary">
		 	</form>
	       </div>
       </div>
       <?php } ?>
   </div>
</div>

<?php session_destroy(); ?>

<?php include("include/layout/footer.php"); ?>
 
</body>
</html>