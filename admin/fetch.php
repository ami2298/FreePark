<?php  
session_start();
if($_SESSION['login_user']=='admin' && $_SESSION['login_pass'] == 'Amit@143') {
 //fetch.php  
require('../db.php');  
 if(isset($_POST["item_id"]))  
 {  
      $query = "SELECT * FROM plot_detail WHERE plot_id = '".$_POST["item_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
    
} else {
     header('Location:unauth.php');
}
 ?>