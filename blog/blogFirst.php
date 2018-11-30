<?php session_start(); ?>
<?php require_once("include/databaseConnection.php");?>
<?php require_once("include/functions.php"); ?>
<?php 
 $current_blog_subject = null;
 if(isset($_GET["content"]))
   {
  $current_blog_subject = $_GET["content"];
  if($current_blog_subject == 78429 )
   { redirect_to('include/adminLoginFolder/adminLogin.php'); }
   }
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Blog</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link rel="stylesheet" type="text/css" href="test.css">
    
</head>
<body>
   
<nav class="navbar navbar-inverse  bg-dark navbar-dark" style="padding-left: 30px;padding-right: 30px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a id="menu-toggler"><span class="fas fa-server" style="height: 20px;width: 20px;margin-top: 15px;"></span></a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navOptions">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="navOptions">
      <ul class="nav navbar-nav">
        <li class="nav-item"><a href="#" class="nav-link"><span class="fas fa-home"></span> Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

   <div id="wrapper" style="margin-top: -20px;">
    <!-- side bar menu -->
    <div id="sidebar-wrapper">
       <ul id="navbar-options">
        <h5 style="margin-top: 20px;">Blog contents</h5>
        <?php  $blogDetails = find_all_blogDetails(); ?>
          <?php while($subject = mysqli_fetch_assoc($blogDetails))
          { ?>

          <?php
                     echo "<li ";
                     if($subject["id"] == $current_blog_subject)
                     {echo "class=\"selected\"";}
                     echo ">";

             ?>
            <a  href="blogFirst.php?content=<?php echo urlencode($subject["id"])?>">
              <?php echo $subject["name"]; ?>
            </a>
            <!-- <div style="height: 2px;width: 130%;background-color:#aaa;margin-left: -40px;margin-top: 5px;"></div> -->
     <?php } ?>
       </ul>
     </div>
   
   

    <!-- main content of page -->
    <div id="main-content">
      <div class="row">
      <div class="container-fluid" style="background-color:#f7f7f7">      
         <div class="col-sm-12 col-md-9"> 
        <?php if($current_blog_subject)
        {
          $current_subject = find_subject_by_id($current_blog_subject);
          $blogcontents = find_blogcontent_by_subjectid($current_blog_subject);
          ?>
          
          <h5 style="text-transform: uppercase;font-weight: bold;">
          <?php
          echo $current_subject["name"]." : ".$current_subject["blogDate"]."";
          // echo "<span style=\"font-size:15px\">";
          echo "<br>";
          echo "<p style=\" font-size:15px;color:#777;text-transform:lowercase;padding-top:10px;\">";
          echo "By: ";
          echo $blogcontents["author"];
          // echo "<div style=\"width:15%;background-color:black;height:2px;\">";
          echo "</p>";
          // echo "</span>";
          ?>
         </h5>

        <div class="line" style="height: 5px;width: 50%;background-color: #0000ff;"></div>
        <div class="container py-3" style="min-height: 300px;">
          <div class="container py-5" style="border-radius: 20px;">
        <?php
              echo nl2br($blogcontents["blogtexts"]);
         ?>
         </div>
        <!--  <div class="row">
          <div class="col-sm-6 col-md-9"></div>
          <div class="col-sm-6 col-md-3"><span style="text-transform: uppercase;font-size: 15px;font-weight: bold;color: #888">By : </span><h5 style="font-weight: bold;color:#777;text-transform: uppercase;"><?php //echo $blogcontents["author"];?></h5></div>
         </div> -->
        </div>
      </div>
      <!-- <div class="col-sm-12 col-md-3" style="background-color:#cceae7;min-height: 300px;">
       <ul style="list-style: none;">
        <?php
          // $subjectData = select_all_from_subjects();
          // $totalRows = mysqli_num_rows(select_all_from_subjects());
           //$recent1 = $totalRows-1;
          // $recent2 = $totalRows-2;
           //$data2 = fetch_last_data($recent1);
           //$data3 = fetch_second_last_data($recent2);
           //$totalData = array($data2,$data3);
             ?>
         <li>
            <?php //echo $data2["id"]; ?>
         </li>
         <li>
           <?php //echo $data3["id"]; ?>
         </li>
       </ul>
      </div> -->
  
      
      </div>
     <!--  <?php } ?> -->
      </div>
    </div>
  </div>
    
   

<script type="text/javascript">
  $("#menu-toggler").click(function(e){
       $("#wrapper").toggleClass("toggled");
  });
</script>

</body>
</html>