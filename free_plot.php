<?php  
require('db.php');   
   
     
     

            $query = "UPDATE `plot_detail` SET `moodle_id`='No User',`student_name`='No User',`fromtime`='Not Set',`totime`='Not Set',`status`='Available' WHERE plot_id='".$_POST["item_id"]."'";  
           
           mysqli_query($connect, $query);
          
 
       
 ?>