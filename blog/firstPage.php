<?php session_start(); ?>
<?php require_once("include/databaseConnection.php");?>
<?php require_once("include/functions.php"); ?>
<?php 
 $current_blog_subject = null;
 if(isset($_GET["content"]))
   {
 	$current_blog_subject = $_GET["content"];
 	if($current_blog_subject == 78429 ) { redirect_to('include/adminLoginFolder/adminLogin.php'); }
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

<div class="container-fluid bg-light" style="min-height:100%;">

	<div class="row">

		 <div class="col-xs-3 col-sm-3 col-md-3 py-2" id="sideBar">
		 	<!-- <a id="buttonslide" href="#" style="float:right;"><i  class="fa fa-server" style="width: 30px;height: 30px;"></i></a> -->
		 	<div class="container py-3 px-3" style="float:left;">
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
		 				<a href="firstPage.php?content=<?php echo urlencode($subject["id"])?>">
		 					<?php echo $subject["name"]; ?>
		 				</a>
		 				 <br>
		 				 <label>Posted on-</label>
		 				<small><?php echo $subject["blogDate"]; ?></small>
		 			</li>
		 			<?php }  ?>
		 		</ol>
		 	</div>
		 </div>

		 <div style="padding-left: 30px;" class="col-xs-8 col-sm-8 col-md-8"> 
		 	<div class="container">
		 		
                <h4 style="text-transform: uppercase;">
		 		<?php if($current_blog_subject)
		 		{
		 			$current_subject = find_subject_by_id($current_blog_subject);
		 			echo $current_subject["name"];

		 		?>
		 	    </h4>
		 		<div class="line" style="height: 1px;width: 50%;background-color: black;"></div>
		 	</div>
		 	<br>
		 	
		 		
		 	<div class="container" style="background-color: #eee;min-height: 300px;">
		 		<?php
		 		$blogcontents = find_blogcontent_by_subjectid($current_blog_subject);
                   echo nl2br($blogcontents["blogtexts"]);
		 		 ?>
		 	</div>
		 </div>
		
		 	<?php } ?>
		 </div>
	</div>  

    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script type="text/javascript">
     	$("#menu-toggler").click(function(e){
            e.preventDefault(); 
            $("#wrapper").toggleClass("toggled");
     	});
     </script>
 
</body>
</html>