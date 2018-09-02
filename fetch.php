<?php  
 //fetch.php  
require('db.php');   
 if(isset($_POST["item_id"]))  
 {  
      $query = "SELECT * FROM plot_detail WHERE plot_id = '".$_POST["item_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>