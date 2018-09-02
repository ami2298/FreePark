
<?php  
require('../db.php'); 
 $query = "SELECT * FROM plot_detail";  
 $result = mysqli_query($connect, $query);  
 
session_start();
if($_SESSION['login_user']=='admin' && $_SESSION['login_pass'] == 'Amit@143') {
 
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
                margin-top: 10px;
                background-color: white;
                padding: 30px;
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


	</body>
	<script>
        
	</script>
</html>
<?php }else{
    header('Location:unauth.php');
} 
  ?>