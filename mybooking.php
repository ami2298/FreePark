<?php
require("booking_expire.php");
?>
<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
  
 


        if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
            include 'user.php';
            $user = new User();
            $conditions['where'] = array(
                'id' => $sessData['userID'],
            );
            $conditions['return_type'] = 'single';
            $userData = $user->getRows($conditions);
             require('db.php'); 
                    $query = "SELECT * FROM plot_detail"; 

            $result = mysqli_query($connect, $query);
            $query1 = "SELECT * FROM plot_detail WHERE moodle_id = '".$userData['moodle']."'"; 
            $result1 = mysqli_query($connect, $query1);
    ?>
<html lang="en">
	<head>
		<title>FreePark | MyBooking</title>
       

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
      
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
                background-color: #ecf0f1;
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
                margin-top: 30px;
               
                padding: 10px;
                margin: auto;
            }
            .parking_plot{
                color: white;
                padding: 10px;
                 margin: auto;
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
            .delete_data,.free_plot{
                
                color:white;
                border: 0px;
                border-radius: 0px;
                width: 100%;
            }
            .section-heading{
                color: white;
            }
            .btn-blue {
  background: #108FE8;
  border: 0px;

  box-shadow: 0 -2px 0 3px #0d72b8 inset, 0 5px 5px rgba(3, 25, 41, 0.17), 0 15px rgba(255, 255, 255, 0.25) inset;
  cursor: pointer;
  display: inline-block;

}
.btn-blue:hover {
  background: #3498db;
 
}

.btn-red {
  background: #E53030;
  border: 0px;
  
  box-shadow: 0 -2px 0 3px #c91919 inset, 0 5px 5px rgba(65, 8, 8, 0.17), 0 15px rgba(255, 255, 255, 0.25) inset;
  cursor: pointer;
  display: inline-block;
  
}
.btn-red:hover {
  background: #BE1A1A;
 
}

.btn-green {
  background: #0EC518;
  border: 0px;
  
  box-shadow: 0 -2px 0 3px #0b9512 inset, 0 5px 5px rgba(0, 7, 1, 0.17), 0 15px rgba(255, 255, 255, 0.25) inset;
  cursor: pointer;
  display: inline-block;
 
}
.btn-green:hover {
  background: #06A20E;
 
}

.btn-yellow {
  background: #FFC334;
  border: 0px;
  border-radius: 100%;
  box-shadow: 0 -2px 0 3px #ffb401 inset, 0 5px 5px rgba(103, 73, 0, 0.17), 0 15px rgba(255, 255, 255, 0.25) inset;
  cursor: pointer;
  display: inline-block;
 
}
.btn-yellow:hover {
  background: #E5A60E;
  
}
           .wrapper {
  background:#e74c3c;
/*
  background: -webkit-gradient(linear, left top, right bottom, from(#50a3a2), to(#53e3a6));
  background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
*/
  position: absolute;
  
  width: 100%;
  height: 100%;
  
  overflow: hidden;
}

.bg-bubbles {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.bg-bubbles li {
  position: absolute;
  list-style: none;
  display: block;
  width: 40px;
  height: 40px;
  background-color: rgba(255, 255, 255, 0.15);
  bottom: -160px;
  -webkit-animation: square 25s infinite;
  animation: square 25s infinite;
  -webkit-transition-timing-function: linear;
  transition-timing-function: linear;
}
.bg-bubbles li:nth-child(1) {
  left: 10%;
}
.bg-bubbles li:nth-child(2) {
  left: 20%;
  width: 80px;
  height: 80px;
  -webkit-animation-delay: 2s;
          animation-delay: 2s;
  -webkit-animation-duration: 17s;
          animation-duration: 17s;
}
.bg-bubbles li:nth-child(3) {
  left: 25%;
  -webkit-animation-delay: 4s;
          animation-delay: 4s;
}
.bg-bubbles li:nth-child(4) {
  left: 40%;
  width: 60px;
  height: 60px;
  -webkit-animation-duration: 22s;
          animation-duration: 22s;
  background-color: rgba(255, 255, 255, 0.25);
}
.bg-bubbles li:nth-child(5) {
  left: 70%;
}
.bg-bubbles li:nth-child(6) {
  left: 80%;
  width: 120px;
  height: 120px;
  -webkit-animation-delay: 3s;
          animation-delay: 3s;
  background-color: rgba(255, 255, 255, 0.2);
}
.bg-bubbles li:nth-child(7) {
  left: 32%;
  width: 160px;
  height: 160px;
  -webkit-animation-delay: 7s;
          animation-delay: 7s;
}
.bg-bubbles li:nth-child(8) {
  left: 55%;
  width: 20px;
  height: 20px;
  -webkit-animation-delay: 15s;
          animation-delay: 15s;
  -webkit-animation-duration: 40s;
          animation-duration: 40s;
}
.bg-bubbles li:nth-child(9) {
  left: 25%;
  width: 10px;
  height: 10px;
  -webkit-animation-delay: 2s;
          animation-delay: 2s;
  -webkit-animation-duration: 40s;
          animation-duration: 40s;
  background-color: rgba(255, 255, 255, 0.3);
}
.bg-bubbles li:nth-child(10) {
  left: 90%;
  width: 160px;
  height: 160px;
  -webkit-animation-delay: 11s;
          animation-delay: 11s;
}
@-webkit-keyframes square {
  0% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
  }
  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
            transform: translateY(-700px) rotate(600deg);
  }
}
@keyframes square {
  0% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
  }
  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
            transform: translateY(-700px) rotate(600deg);
  }
}
            .gloss-shadow{
                box-shadow: 0 5px 5px rgba(3, 25, 41, 0.17), 0 15px rgba(255, 255, 255, 0.25) inset;
            }
        </style>	

    </head>
<body>

         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
        <a class="navbar-brand" href="#">
    
</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">FreePark <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="mybooking.php">My Booking</a>
                </li>
                
            </ul>
            
           

            <ul class="navbar-nav ">
                <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $userData['first_name'].' '.$userData['last_name']; ?>
            </a>
                    <div class="dropdown-menu" aria-labelledby="navDropDownLink">
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="userAccount.php?logoutSubmit=1" class="logout">Logout <i class="fas fa-1x fa-sign-out-alt"></i></a>
                    </div>
                </li>
            </ul>

    </div>

</nav>
<div class="wrapper">
          <ul class="bg-bubbles">
    
  <div class="container parking_detail">
     <div class="alert_errror"></div>
      <div class="container">
      <div class="row" >
          <div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
                        <hr>
						<h2 class="section-heading">My Booking</h2>
						<h3 class="section-subheading text-muted"></h3>
						<hr>
					</div>
                   </div></div>
                         <?php 
                        $total =  0;
                    
                          while($row = mysqli_fetch_array($result1))  
                               { 
                                    
                                if($row["status"] == 'Booked'){
                                    $total++;
                                    
                                    
                                }
                        
                          }
                                  if( $total > 0 ){
                               while($row = mysqli_fetch_array($result))  
                               {  
                                   if($row["moodle_id"] == $userData['moodle']){
                               ?>
                        <div class="col-lg-4 parking_plot gloss-shadow"  style="background-color:<?php if($row["status"]=='Booked'){ echo '#e74c3c';}else if($row["status"]=='Available'){echo '#27ae60';} ?>; color:white;">
                        
                        <div class="row parking_item" >
                            <div class="col-4">Plot Id</div>
                            <div class="col-8">
                                <?php echo $row["plot_id"]; ?>
                            </div>
                            
                        </div>
                        
                        <div class="row parking_item">
                            <div class="col-4">Plot Name</div>
                            <div class="col-8">
                                <?php echo $row["plotname"]; ?>
                            </div>

                        </div>
                        
                        <div class="row parking_item">
                            <div class="col-4">Area</div>
                            <div class="col-8">
                                <?php echo $row["area"]; ?>
                            </div>
                        </div>
                           
                       
                            <div class="row parking_item">
                            <div class="col-4">Status</div>
                            <div class="col-8">
                                <?php echo $row["status"]; ?>
                            </div>
                        </div>
                             <div class="row  parking_item">
                          
                            <div class="col-6">
                                <input type="button" class="btn btn-success free_plot btn-green" name="item_id" id="<?php echo $row["plot_id"]; ?>" value="Free Plot"/><span></span>
                        
                                 
                            </div>
                                 <div class="col-6">
                                <input type="button" class="btn btn-danger delete_data btn-red" name="item_id" id="<?php echo $row["plot_id"]; ?>" value="Cancel Booking"/><span></span>
                        
                                 
                            </div>
                       </div>
                    
                    <?php  
                              
                                   }  }}else{
                                        ?><div class="container"><label class="alert alert-danger" style="width:100%;margin:auto;margin-top:10px;">Book your plot now : No plot booked </label></div> <?php
                                    }  
                            ?></div></div></div></div>
              <li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
              	<li></li>
		<li></li>
		<li></li>	<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
    
    <script>    
     $(document).on('click', '.delete_data', function(){
             
           var item_id = $(this).attr("id"); 
         console.log(item_id);
           $.ajax({  
                url:"cancel_booking.php",  
                method:"POST",  
                data:{item_id:item_id},  
  
                     success:function(data){
                      location.reload();    
                         
                     }  
               
           });  
      });
             $(document).on('click', '.free_plot', function(){
             
           var item_id = $(this).attr("id"); 
         console.log(item_id);
           $.ajax({  
                url:"free_plot.php",  
                method:"POST",  
                data:{item_id:item_id},  
  
                     success:function(data){
                          
                        location.reload();
                     }  
               
           });  
      });
    </script>
    </body></html>

    <?php }else{ ?>
    <html>
        <head>
            <title>FreePark | LOGIN </title>
       

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
      
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css'>
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
            <style>
            @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300);
* {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-weight: 300;
}
body {
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  font-weight: 300;
}
body ::-webkit-input-placeholder {
  /* WebKit browsers */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  font-weight: 300;
}
body :-moz-placeholder {
  /* Mozilla Firefox 4 to 18 */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  opacity: 1;
  font-weight: 300;
}
body ::-moz-placeholder {
  /* Mozilla Firefox 19+ */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  opacity: 1;
  font-weight: 300;
}
body :-ms-input-placeholder {
  /* Internet Explorer 10+ */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  font-weight: 300;
}
.wrapper {
  background: #50a3a2;
  background: -webkit-gradient(linear, left top, right bottom, from(#50a3a2), to(#53e3a6));
  background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
  position: absolute;
  
  width: 100%;
  height: 100%;
  
  overflow: hidden;
}
.wrapper.form-success .container h1 {
  -webkit-transform: translateY(85px);
          transform: translateY(85px);
}
.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 80px 0;
  height: 100%;
  text-align: center;
}
.container h1 {
  font-size: 40px;
  -webkit-transition-duration: 1s;
          transition-duration: 1s;
  -webkit-transition-timing-function: ease-in-put;
          transition-timing-function: ease-in-put;
  font-weight: 200;
}
form {
  padding: 20px 0;
  position: relative;
  z-index: 2;
}
form input {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  outline: 0;
  border: 1px solid rgba(255, 255, 255, 0.4);
  background-color: rgba(255, 255, 255, 0.2);
  width: 250px;
  border-radius: 3px;
  padding: 10px 15px;
  margin: 0 auto 10px auto;
  display: block;
  text-align: center;
  font-size: 18px;
  color: white;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
  font-weight: 300;
}
form input:hover {
  background-color: rgba(255, 255, 255, 0.4);
}
form input:focus {
  background-color: white;
  width: 300px;
  color: #53e3a6;
}
form button {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  outline: 0;
  background-color: white;
  border: 0;
  padding: 10px 15px;
  color: #53e3a6;
  border-radius: 3px;
  width: 250px;
  cursor: pointer;
  font-size: 18px;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
}
form button:hover {
  background-color: #f5f7f9;
}
.bg-bubbles {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.bg-bubbles li {
  position: absolute;
  list-style: none;
  display: block;
  width: 40px;
  height: 40px;
  background-color: rgba(255, 255, 255, 0.15);
  bottom: -160px;
  -webkit-animation: square 25s infinite;
  animation: square 25s infinite;
  -webkit-transition-timing-function: linear;
  transition-timing-function: linear;
}
.bg-bubbles li:nth-child(1) {
  left: 10%;
}
.bg-bubbles li:nth-child(2) {
  left: 20%;
  width: 80px;
  height: 80px;
  -webkit-animation-delay: 2s;
          animation-delay: 2s;
  -webkit-animation-duration: 17s;
          animation-duration: 17s;
}
.bg-bubbles li:nth-child(3) {
  left: 25%;
  -webkit-animation-delay: 4s;
          animation-delay: 4s;
}
.bg-bubbles li:nth-child(4) {
  left: 40%;
  width: 60px;
  height: 60px;
  -webkit-animation-duration: 22s;
          animation-duration: 22s;
  background-color: rgba(255, 255, 255, 0.25);
}
.bg-bubbles li:nth-child(5) {
  left: 70%;
}
.bg-bubbles li:nth-child(6) {
  left: 80%;
  width: 120px;
  height: 120px;
  -webkit-animation-delay: 3s;
          animation-delay: 3s;
  background-color: rgba(255, 255, 255, 0.2);
}
.bg-bubbles li:nth-child(7) {
  left: 32%;
  width: 160px;
  height: 160px;
  -webkit-animation-delay: 7s;
          animation-delay: 7s;
}
.bg-bubbles li:nth-child(8) {
  left: 55%;
  width: 20px;
  height: 20px;
  -webkit-animation-delay: 15s;
          animation-delay: 15s;
  -webkit-animation-duration: 40s;
          animation-duration: 40s;
}
.bg-bubbles li:nth-child(9) {
  left: 25%;
  width: 10px;
  height: 10px;
  -webkit-animation-delay: 2s;
          animation-delay: 2s;
  -webkit-animation-duration: 40s;
          animation-duration: 40s;
  background-color: rgba(255, 255, 255, 0.3);
}
.bg-bubbles li:nth-child(10) {
  left: 90%;
  width: 160px;
  height: 160px;
  -webkit-animation-delay: 11s;
          animation-delay: 11s;
}
@-webkit-keyframes square {
  0% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
  }
  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
            transform: translateY(-700px) rotate(600deg);
  }
}
@keyframes square {
  0% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
  }
  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
            transform: translateY(-700px) rotate(600deg);
  }
}

            </style>
        </head>
    </html>
		
	
	
	

<div class="wrapper">
          <ul class="bg-bubbles"> 
	<div class="container">
		<h1>Welcome to FreePark | Login</h1>
        <h2>Login to Your Account</h2>
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="regisFrm">
        <form action="userAccount.php" method="post" class="form">
            <input type="text"  pattern=[0-9]{8} name="moodle" placeholder="Moodle ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="send-button">
                <input type="submit" name="loginSubmit" id="login-button" value="Log In">
            </div>
        </form>
        <p>Don't have an account? <a href="registration.php">Register</a></p>
    </div>
        </div>
    
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
    </div>
     <?php } ?>
