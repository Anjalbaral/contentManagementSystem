<!DOCTYPE html>
<html>
<head>
	<title>responsive</title>

	<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="test.css">
    
</head>
<body>
     <navbar class="navbar navbar-expand-sm navbar-dark bg-dark" id="navbar">
     	<a href="#" id="menu-toggler" class="navbar-brand"><span class="fa fa-server"></span></a>
     </navbar>
   <div id="wrapper">
     		<!-- sidebar -->
     	<div id="sidebar-wrapper">
             <ul class="navbar-options">
          	<li><a href="#">first</a></li>
          	<li><a href="#">second</a></li>
          	<li><a href="#">third</a></li>
          </ul>
     	</div>
     		<!-- main menu -->
     	<div id="page-content" >
     	<div class="container-fluid">
	     	<div class="row">
		     	<div class="col-md-10">	
		     		
		     	</div>
	        </div>
        </div>
        </div>
   </div>

     		
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script type="text/javascript">
     	$("#menu-toggler").click(function(e){
            e.preventDefault(); 
            $("#wrapper").toggleClass("toggled");
     	});
     </script>

</body>
</html>