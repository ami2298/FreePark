<?php
require('db.php');  
$query =" select * from plot_detail";
$result = mysqli_query($connect,$query);
date_default_timezone_set("Asia/kolkata");
   
while($row = mysqli_fetch_array($result))  
           {  

    if( strtotime(date('H:i'))  > strtotime($row["totime"])){
          
    $query = "UPDATE `plot_detail` SET`moodle_id`='No User',`student_name`='No User',`fromtime`='Not Set',`totime`='Not Set',`status`='Available' WHERE plot_id='".$row["plot_id"]."'";  
        
            mysqli_query($connect,$query);
        
}
}
    ?>