<?php  
session_start();
if($_SESSION['login_user']=='admin' && $_SESSION['login_pass'] == 'Amit@143') {
 
require('../db.php'); 
 if(isset($_POST))  
 {  
      $output = '';  
      $message = '';  
      $plotname = mysqli_real_escape_string($connect, $_POST["plotname"]);  
      $area = mysqli_real_escape_string($connect, $_POST["area"]);  
      $status = mysqli_real_escape_string($connect, $_POST["status"]);  
      
  
      if($_POST["item_id"] != '')  
      {  
           $query = "  
           UPDATE plot_detail   
           SET plotname='$plotname',   
           area='$area',   
           status='$status',   
           WHERE plot_id='".$_POST["item_id"]."'";  
           $message = 'Parking Plot Updated'; 
          $output .= '<div class=""><label class="alert alert-success" style="width:100%;margin:auto;margin-top:10px;">' . $message . '</label></div>'; 
      }  
      else  
      {  
           $query = "  
           INSERT INTO plot_detail(plotname, area, status)  
           VALUES('$plotname', '$area', '$status');  
           ";  
           $message = 'New Parking Plot Added'; 
          $output .= '<div class="container"><div class="row">
                    <div class="col-12" align="right">
                        <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary add_btn" style="width:100%;margin:auto;margin-top:10px;"><span><i class="fas fa-car" style="margin-right:5px;"> </i>Add Parking</span> </button>
                    </div></div>
                </div><div class="container"><label class="alert alert-success" style="width:100%;margin:auto;margin-top:10px;">' . $message . '</label></div>'; 
      }  
      if(mysqli_query($connect, $query))  
      {  
            $select_query = "SELECT * FROM plot_detail order by area DESC";  
           $result = mysqli_query($connect, $select_query);  
          
          $output .= '  
                
                
                    <div class="container" id="menu_table">
                    <div class="container">
                    <div class="row">
                     
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                
                $output .= ' 
                
                        <div class="col-lg-4 parking_plot">
                        <div class="row parking_item">
                            <div class="col-4">Plot ID</div>
                            <div class="col-8">'. $row["plot_id"].'</div>
                        </div>
                        <div class="row parking_item">
                            <div class="col-4">Plot Name</div>
                            <div class="col-8">'.$row["plotname"].'</div>

                        </div>
                        <div class="row parking_item">
                            <div class="col-4">Area</div>
                            <div class="col-8">'.$row["area"].' 
                                
                            </div>
                        </div>
                    
                             <div class="row parking_item">
                            <div class="col-4">Parking Status</div>
                            <div class="col-8">'.$row["status"].'</div>
                        </div>
                        <div class="row parking_item">
                           
                            <div class="col-12"><button type="button" name="view" value="Delete" id="'.$row["plot_id"].'" class="btn btn-danger add_btn delete_data"style="width:100%"><span><i class="fa fa-trash" ></i></span></button></div>
                            </div>
                        </div>
                        
                ';  
           }  
           $output .= '</div>';  
           $output .= '</div>';  
             $output .= '</div>';
      }
      echo $output;  
 } 
    }else{
    header('Location:unauth.php');
} 
 ?>