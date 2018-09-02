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
<html>

<head>
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
                margin-top: 10px;
                background-color: white;
                padding: 10px;
            }
            .parking_plot{
                
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
                    <a class="nav-link" href="dashboard.php">Dash Board<span class="sr-only">(current)</span></a>
                </li>
                
                  <li class="nav-item">
                    <a  class="nav-link" href="analytic.php">Analytics</a>
                </li>
                <li><a name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class=" nav-link" ><span><i class="fas fa-car" style="margin-right:5px;"> </i>Add Parking</span> </a></li>
                 
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
                        <hr>
						<h2 class="section-heading">Flagarea</h2>
						<h3 class="section-subheading text-muted"></h3>
						<hr>
					</div>
                   </div></div>
                        <?php  $count_flag =  0;
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
                                    if($row["area"]== 'Flagarea'){
                               ?>   
                
                   <div class="col-lg-4 parking_plot">
                        
                        <div class="row parking_item">
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
                           
                            <div class="col-12"><button type="button" name="view" value="Delete" id="<?php echo $row["plot_id"]; ?>" class="btn btn-danger add_btn delete_data"style="width:100%"><span><i class="fa fa-trash" ></i></span></button></div>
                            </div>
                        </div>
                        <?php  
                               }
                               
                               } }else{
                                        ?><div class="container"><label class="alert alert-success" style="width:100%;margin:auto;margin-top:10px;">No Plot Available in Flagarea</label></div> <?php
                                    }
                               ?>
            
            </div></div>
            <div class="container">
          <div class="row">
               <div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
                        <hr>
						<h2 class="section-heading">Basement</h2>
						<h3 class="section-subheading text-muted"></h3>
						<hr>
					</div>
                   </div></div>
                        <?php  
                  if($count_base != 0){
                               while($row = mysqli_fetch_array($result1))  
                               {  
                                    if($row["area"]== 'Basement'){
                               ?>
                   <div class="col-lg-4 parking_plot">
                        
                        <div class="row parking_item">
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
                           
                            <div class="col-12"><button type="button" name="view" value="Delete" id="<?php echo $row["plot_id"]; ?>" class="btn btn-danger add_btn delete_data"style="width:100%"><span><i class="fa fa-trash" ></i></span></button></div>
                            </div>
                        </div>
                        <?php  
                               }  }}else{
                                        ?><div class="container"><label class="alert alert-success" style="width:100%;margin:auto;margin-top:10px;">No Plot Available in Basement</label></div> <?php
                                    }
                               ?>
            
                    </div>
                </div>
            </div>
<!--
    
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Dish Details</h4>
                </div>
                <div class="modal-body" id="employee_detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
-->
    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title">Plot Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" id="insert_form">
                        <label>Plot Name</label>
                        <input type="text" name="plotname" id="plotname" class="form-control" />
                        <br />
                       
                        <label>Area</label>
                        <select name="area" id="area" class="form-control">  
                               <option value="Flagarea">Flagarea</option>  
                               <option value="Basement">Basement</option>  
                               
                          </select>
                        <br/>
                        
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">  
                                <option value="Available">Available</option>
                                <option value="Booked">Booked</option> 
                          </select>
                        

                        <br />
                        <input type="hidden" name="item_id" id="item_id" /><span></span>
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success add_btn" /><span></span>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
    <script>
            $(document).on('click', '.delete_data', function(){

               var item_id = $(this).attr("id");  
               $.ajax({  
                    url:"delete.php",  
                    method:"POST",  
                    data:{item_id:item_id},  

                         success:function(data){

                              $('#insert_form')[0].reset();  
                              $('#add_data_Modal').modal('hide');  
                              $('#menu_table').html(data);  
                         }  

               });  
          });  


 $(document).ready(function(){
 
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault(); 
           if($('#plotname').val() == "")  
           {  
                alert("Please Enter the Dishname");  
           }  
           else if($('#area').val() == '')  
           {  
                alert("Price is required");  
           } 
           else if($('#status').val() == '')  
           {  
                alert("Stat is required");  
           }
            else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");
                         
                     },  
                     success:function(data){
                          
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#menu_table').html(data);  
                     }  
                });  
           }
          
      });  
     
                
                 
 });  
    </script>
    
    <?php }else {
                           header('Location:unauth.php');        
                               }?>