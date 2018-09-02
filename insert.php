<?php  
require('db.php'); 
   date_default_timezone_set("Asia/kolkata");
      $output = '';  
      $message = ''; 
        $counter =0;
        $moodle = mysqli_real_escape_string($connect, $_POST["moodle"]);  
     $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $plotname = mysqli_real_escape_string($connect, $_POST["plotname"]);  
      $area = mysqli_real_escape_string($connect, $_POST["area"]);  
      $totime = mysqli_real_escape_string($connect, $_POST["totime"]);  
      $fromtime = mysqli_real_escape_string($connect, $_POST["fromtime"]); 
      $no_query ="select * from plot_detail where moodle_id='".$moodle."'";
      $result1 = mysqli_query($connect,$no_query);
         while($row1 = mysqli_fetch_array($result1)){
             if($row1["status"] == 'Booked'){
                 $counter++;
             }
         } 

if($counter == 0){
    if( strtotime(date('H:i'))  > strtotime($fromtime)){
        $output = '<script>alert("Please Enter Proper In Time")</script>';  
           echo $output;
           
    }else if(strtotime(date('H:i'))  > strtotime($totime)){
           
           $output = '<script>alert("Please Enter Proper Out Time")</script>';  
           echo $output;
       }
    else if(strtotime($fromtime) > strtotime($totime)){
         $output = '<script>alert("OutTime must be greater then InTime")</script>';  
           echo $output;
    }else{
            $query = "UPDATE `plot_detail` SET `moodle_id`='".$moodle."',`student_name`='".$name."',`fromtime`='".$fromtime."',`totime`='".$totime."',`status`='Booked' WHERE plot_id='".$_POST["item_id"]."'";  
           
           mysqli_query($connect, $query);
          
       }
}else{
   
           $output = '<script>alert("You can only book one plot")</script>';  
           echo $output;
}
              
  
       
 ?>