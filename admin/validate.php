<?php
 
require('../db.php');  
 $query = "SELECT * FROM admin";  
 $result = mysqli_query($connect, $query);  

$row = mysqli_fetch_array($result);

session_start();
// Store Session Data
$_SESSION['login_user'] = $_POST["username"];
$_SESSION['login_pass'] = $_POST["password"];

if($row["username"] == $_POST["username"] && $row["password"] ==  $_POST["password"])
{
    header('location:dashboard.php');
}else{
     header('location:error.php');
}

?>