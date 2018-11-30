<?php session_start(); ?>
<?php require_once("include/databaseConnection.php");?>
<?php require_once("include/functions.php"); ?>
<?php $_SESSION["message"] = null; ?>
<?php 

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
    	#addlink2
    	{
    		color: #999;
    		text-decoration:none;
    		font-weight: bold;
    	}
    	#addlink2:hover
    	{
    		color: #555;
    	}
    </style>
</head>
<body>
 
  	<?php include("include/layout/header.php"); ?>

<div class="container-fluid bg-light" style="min-height: 600px;">
	<div class="row">
		 <div class="col-xs-3 col-sm-3 col-md-3" id="sideBar">
		 	<div class="container py-3"><a id="addlink2" href="include/adminLoginFolder/adminLogin.php"><span style="width: 50px;height: 50px;color: #999" class="fas fa-sign-out-alt"></span><lable>logout</lable></a></div>
		 	<div class="container">
		 		<p>
		 			<h3><a class="addlink" href="newBlog.php">+Add Blog</a></h3>
		 		</p>
		 		<h4 style="color:#999">Blog contents</h4>
		 		<ol class="contents">

		 			<?php  $blogDetails = find_all_blogDetails(); ?>
		 			<?php while($subject = mysqli_fetch_assoc($blogDetails))
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
		 			<?php } ?>
		 		</ol>
		 	</div>
		 </div>
		 <div class="col-xs-9 col-sm-9 col-md-9"> 
		 	<div class="container">
		 		<h4>welcome to blog section</h4>
		 		<br>
		 		<?php if(isset($_SESSION["deleted"])){echo $_SESSION["deleted"];} ?>
		 		<?php if(isset($_SESSION["MESSAGE"])
		 		){ echo $_SESSION["MESSAGE"]; }
		 		if(isset($_SESSION["filemsg"]))
		 		{
		 			echo $_SESSION["filemsg"];
		 		}
		 		?>
		 		
		 		<?php if($current_blog_subject)
		 		{
		 			$current_subject = find_subject_by_id($current_blog_subject);
		 			echo $current_subject["name"];
		 		?>
		 		<form method="POST" action="editContent.php?content=<?php echo urlencode($current_blog_subject)?>">
		 		<button type="submit" name="edit" class="btn btn-primary">Edit</button>
		 		<button type="submit" name="delete" class="btn btn-primary">Delete</button></a>
                </form>
		 		<div class="line my-2" style="height: 1px;width: 50%;background-color: black;"></div>
		 	</div>
		 	<br>
		 	<div class="container" style="background-color: #eee;min-height: 300px;">
		 		<?php
		 		$blogcontents= find_blogcontent_by_subjectid($current_blog_subject);
                   echo nl2br($blogcontents["blogtexts"]);
		 		 ?>
		 	</div>
		 	<?php } ?>
		 </div>
	</div>
</div>

<?php session_destroy(); ?>

<?php include("include/layout/footer.php"); ?>
 
</body>
</html>