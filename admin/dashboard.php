<?php

session_start();
if($_SESSION['login_user']=='admin' && $_SESSION['login_pass'] == 'Amit@143') {
require('../db.php');  
 $query = "SELECT * FROM plot_detail";  
 $result = mysqli_query($connect, $query);
$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/gif/png" href="img/IT%20Batches.png">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css'>
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
		<style>
        body{
			font-family: Comfortaa;
			font-style: normal;
			font-variant: normal;
			}
            .form-control{
                background-color: #e9ecef;
                border-radius:0px;
                border: 1px #3498db solid; 
                margin:5px;
                margin-right: 10px;
                width: 98%;
            }
            .parking_detail{
                color: white;
                margin-top: 20px;
                margin-bottom: 20px;
                background-color: white;
                padding: 20px;
                box-shadow: 0 5px 5px rgba(3, 25, 41, 0.25), 0 15px rgba(255, 255, 255, 0.50) inset;
            }
            .parking_plot{
                border: 1px white solid;
                padding: 10px;
            }
            .parking_item{
                padding: 2px;
            }
            .modal-content{
                border-radius: 0px;
                color:#34495e;
                background-color: #e9ecef;
            }
            .form_input{
                padding: 5px;
            }
            .book_plot{
                background-color: #3498db;
                color:white;
                border: 0px;
                border-radius: 0px;
                width: 100%;
            }
            .section-heading{
                padding: 10px;
                padding-bottom: 10px;
                color: black
            }
             .gloss-shadow{
                box-shadow: 0 5px 5px rgba(3, 25, 41, 0.17), 0 15px rgba(255, 255, 255, 0.25) inset;
            }
        </style>
	</head>
	<body >
        
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
        <a class="navbar-brand" href="#">
    
</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">Dash Board<span class="sr-only">(current)</span></a>
                </li>
                
                  <li class="nav-item">
                    <a  class="nav-link" href="analytic.php">Analytics</a>
                </li><li class="nav-item">
                    <a  class="nav-link" href="edit.php">Manage Plot</a>
                </li>
              
                 
            </ul>
            
           

            <ul class="navbar-nav ">
                <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin
                
            </a>
                    <div class="dropdown-menu" aria-labelledby="navDropDownLink">
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php" class="logout">Logout <i class="fas fa-1x fa-sign-out-alt"></i></a>
                    </div>
                </li>
            </ul>

    </div>

</nav>

	
		<div class="container parking_detail" id="menu_table">
            <div class="container">
            <div class="row">
                <div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2 class="section-heading">Flagarea</h2>
						<h3 class="section-subheading text-muted"></h3>
						<hr>
					</div>
                   </div></div>
                        <?php 
                 $count_flag =  0;
                $count_base = 0;
                          while($row = mysqli_fetch_array($result2))  
                               { 
                                if($row["area"] == 'Flagarea'){
                                    $count_flag++;
                                }
                              else if($row["area"] == 'Basement'){
                                  $count_base++;
                              }
                          }
      if($count_flag != 0){
                               
                               while($row = mysqli_fetch_array($result))  
                               { 
                                   if($row["area"]=='Flagarea'){
                               ?>
               
                       <div class="col-lg-4 parking_plot gloss-shadow" style="background-color:<?php if($row["status"]=='Booked'){ echo '#e74c3c';}else if($row["status"]=='Available'){echo '#27ae60';} ?>">
                        
                        <div class="row parking_item">
                            <div class="col-6">Plot Id</div>
                            <div class="col-6">
                                <?php echo $row["plot_id"]; ?>
                            </div>
                            
                        </div>
                           
                        <div class="row parking_item">
                            <div class="col-6">Plot Name</div>
                            <div class="col-6">
                                <?php echo $row["plotname"]; ?>
                            </div>

                        </div>
                            
                        <div class="row parking_item">
                            <div class="col-6">Area</div>
                            <div class="col-6">
                                <?php echo $row["area"]; ?>
                            </div>
                        </div>
                            
                        <div class="row parking_item">
                            <div class="col-6">Moodle ID</div>
                            <div class="col-6">
                                <?php echo $row["moodle_id"]; ?>
                            </div>
                        </div>
                           
                        <div class="row parking_item">
                            <div class="col-6">Student Name</div>
                            <div class="col-6">
                                <?php echo $row["student_name"]; ?>
                            </div>
                        </div>
                            
                             <div class="row parking_item">
                            
                                  <div class="col-3">From</div>
                            <div class="col-3">
                                <?php echo $row["fromtime"]; ?>
                            </div>
                                 <div class="col-3">To</div>
                            <div class="col-3">
                                <?php echo $row["totime"]; ?>
                            </div>
                        </div>
                            
                             <div class="row parking_item">
                            <div class="col-4">Status</div>
                            <div class="col-8">
                                <?php echo $row["status"]; ?>
                            </div>
                        </div>
                       
                      </div>
            
                       
                        <?php  
                               } }  }
                                    else{
                                        ?><div class="container"><label class="alert alert-success" style="width:100%;margin:auto;margin-top:10px;">No Plot Available in Flagarea</label></div> <?php
                                    }
                               ?>
               
            
                </div>
                <hr>
            </div>
            <div class="container">
                <div class="row">
                    <div class="container">
                <div class="row">
					<div class="col-lg-12 text-center">
						<h2 class="section-heading">Basement</h2>
						<h3 class="section-subheading text-muted"></h3>
						<hr>
					</div>
                   </div></div>
                        <?php 
                
                        if($count_base != 0){
                        
                               while($row = mysqli_fetch_array($result1))  
                               { 
                                   
                                   if($row["area"]=='Basement'){
                               ?>
               
                       <div class="col-lg-4 parking_plot gloss-shadow" style="background-color:<?php if($row["status"]=='Booked'){ echo '#e74c3c';}else if($row["status"]=='Available'){echo '#27ae60';} ?>">
                        
                        <div class="row parking_item">
                            <div class="col-6">Plot Id</div>
                            <div class="col-6">
                                <?php echo $row["plot_id"]; ?>
                            </div>
                            
                        </div>
                           
                        <div class="row parking_item">
                            <div class="col-6">Plot Name</div>
                            <div class="col-6">
                                <?php echo $row["plotname"]; ?>
                            </div>

                        </div>
                            
                        <div class="row parking_item">
                            <div class="col-6">Area</div>
                            <div class="col-6">
                                <?php echo $row["area"]; ?>
                            </div>
                        </div>
                            
                        <div class="row parking_item">
                            <div class="col-6">Moodle ID</div>
                            <div class="col-6">
                                <?php echo $row["moodle_id"]; ?>
                            </div>
                        </div>
                           
                        <div class="row parking_item">
                            <div class="col-6">Student Name</div>
                            <div class="col-6">
                                <?php echo $row["student_name"]; ?>
                            </div>
                        </div>
                            
                             
                             <div class="row parking_item">
                            
                                  <div class="col-3">From</div>
                            <div class="col-3">
                                <?php echo $row["fromtime"]; ?>
                            </div>
                                 <div class="col-3">To</div>
                            <div class="col-3">
                                <?php echo $row["totime"]; ?>
                            </div>
                        </div>
                            
                             <div class="row parking_item">
                            <div class="col-4">Status</div>
                            <div class="col-8">
                                <?php echo $row["status"]; ?>
                            </div>
                        </div>
                       
                      </div>
            
                       
                        <?php  
                               } } }else{
                                        ?><div class="container"><label class="alert alert-success" style="width:100%;margin:auto;margin-top:10px;">No Plot Available in Basement</label></div> <?php
                                    }
                               ?>
                
                </div>
            <hr></div></div>
	</body>
	<script>
        
	</script>
</html>

<?php }else{
    header('Location:unauth.php');
} 
  ?>