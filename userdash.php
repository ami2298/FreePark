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
             $result1 = mysqli_query($connect, $query);
            $result2 = mysqli_query($connect, $query);
    ?>
    <html lang="en">

    <head>
        <title>FreePark </title>


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
            body {
                font-family: Comfortaa;
                font-style: normal;
                font-variant: normal;
                background-color: #ecf0f1;
            }

            .form-control {
                background-color: #e9ecef;
                border-radius: 0px;
                border: 1px #3498db solid;
                margin: 5px;
                margin-right: 10px;
                width: 98%;
            }

            .parking_detail {
                margin-top: 20px;
                margin-bottom: 20px;
                background-color: white;
                padding: 20px;
            }

            .parking_plot {
                border: 1px white solid;
                padding: 10px;
            }

            .parking_item {
                padding: 2px;
            }

            .modal-content {
                border-radius: 0px;
                color: #34495e;
                background-color: #e9ecef;
            }

            .form_input {
                padding: 5px;
            }

            .book_plot {
                background-color: #3498db;
                color: white;
                border: 0px;
                border-radius: 0px;
                width: 100%;
            }

            .gloss-shadow {
                box-shadow: 0 5px 5px rgba(3, 25, 41, 0.17), 0 15px rgba(255, 255, 255, 0.25) inset;
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
                background: #4cd137;
                /*
  background: -webkit-gradient(linear, left top, right bottom, from(#50a3a2), to(#53e3a6));
  background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
*/
                position: absolute;

                width: 100%;


                overflow: hidden;
            }

            .bg-bubbles {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
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
                        <a class="nav-link" href="mybooking.php">My Booking</a>
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



            <div class="container parking_detail ">
                <div class="container">
                    <div class="alert_errror"></div>
                    <div class="row ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <hr>
                                    <h2 class="section-heading">Flagarea<i class="fas fa-sync-alt fa-spin" style="margin-left:5px"></i></h2>
                                    <h3 class="section-subheading text-muted"></h3>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <?php  
                $count_flag =  0;
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


                        <div class="col-lg-4 parking_plot gloss-shadow" style="background-color:<?php if($row[" status "]=='Booked'){ echo '#e74c3c';}else if($row["status "]=='Available'){echo '#4cd137';} ?>; color:white;">

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
                                <?php if($row["status"]=='Available'){ ?>
                                <div class="col-12"><button type="button" name="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary edit_data btn-green" type="button" id="<?php echo $row[" plot_id "]; ?>" style="width:100%">Book Now<i class="fas fa-car" style="margin-left:5px;"> </i></button></div>
                                <?php }else{?>
                                <div class="col-12"><button type="button" class="btn btn-danger btn-red" type="button" onclick="alreadybook();" id="<?php echo $row[" plot_id "]; ?>" style="width:100%">Book Now</button></div>
                                <?php } ?>
                            </div>
                        </div>

                        <?php  
                                   }  }}else{
                                        ?>
                        <div class="container"><label class="alert alert-success" style="width:100%;margin:auto;margin-top:10px;">No Plot Available in Flagarea</label></div>
                        <?php
                                    }
                                   
                                
                               ?>
                    </div>
                    <hr>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h2 class="section-heading">Basement <i class="fas fa-sync-alt fa-spin" style="margin-left:5px"></i></h2>
                                    <h3 class="section-subheading text-muted"></h3>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <?php 
            if($count_base != 0){
                               while($row = mysqli_fetch_array($result1))  
                               {  
                                   if($row["area"]== 'Basement'){
                               ?>


                        <div class="col-lg-4 parking_plot gloss-shadow" style="background-color:<?php if($row[" status "]=='Booked'){ echo '#e74c3c';}else if($row["status "]=='Available'){echo '#4cd137';} ?>; color:white;">

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
                                <?php if($row["status"]=='Available'){ ?>
                                <div class="col-12"><button type="button" name="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary edit_data btn-green" type="button" id="<?php echo $row[" plot_id "]; ?>" style="width:100%">Book Now<i class="fas fa-car" style="margin-left:5px;"> </i></button></div>
                                <?php }else{?>
                                <div class="col-12"><button type="button" class="btn btn-danger btn-red" type="button" onclick="alreadybook();" id="<?php echo $row[" plot_id "]; ?>" style="width:100%">Book Now</button></div>
                                <?php } ?>
                            </div>
                        </div>

                        <?php  
                               }  }}else{
                                        ?>
                        <div class="container"><label class="alert alert-success" style="width:100%;margin:auto;margin-top:10px;">No Plot Available in Basement</label></div>
                        <?php
                                    }
                               
              
                               ?>
                    </div>
                    <hr>
                </div>
            </div>
            <ul class="bg-bubbles">
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
        <div id="add_data_Modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title">Book Plot</h4>
                        <hr>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <form method="post" id="insert_form">

                            <label><h5>User Details</h5></label><br>


                            <input type="text" name="moodle" id="moodle" value="<?php echo $userData['moodle']; ?>" class="form-control" readonly="readonly" />

                            <input type="text" name="name" id="name" value="<?php echo $userData['first_name']; ?> <?php echo $userData['last_name']; ?>" class="form-control" readonly/>

                            <input type="text" name="plotname" id="plotname" value="" class="form-control" readonly/>


                            <input type="text" name="area" id="area" value="" class="form-control" readonly/>




                            <label class="form-control">From</label>

                            <input type="time" name="fromtime" id="fromtime" class="form-control" min="09:00" max="17:00" required/>

                            <label class="form-control">To</label>

                            <input type="time" name="totime" id="totime" class="form-control" min="09:00" max="17:00" required/>


                            <input type="hidden" name="item_id" id="item_id" /><span></span>
                            <input type="submit" name="insert" id="insert" value="Get Plot" class="btn btn-success add_btn book_plot btn-blue" /><span></span>

                        </form>

                    </div>

                </div>
            </div>
        </div>


        <script>
            function alreadybook() {
                sweetAlert({
                    type: 'error',
                    title: 'Already Booked',
                    text: 'Please Book Available Plot',
                    footer: '<a href>Why do I have this issue?</a>',
                })
            }
            $(document).ready(function() {


                $('#add').click(function() {
                    $('#insert').val("Insert");
                    $('#insert_form')[0].reset();
                });
                $(document).on('click', '.edit_data', function() {
                    var item_id = $(this).attr("id");

                    $.ajax({
                        url: "fetch.php",
                        method: "POST",
                        data: {
                            item_id: item_id
                        },
                        dataType: "json",
                        success: function(data) {

                            $('#area').val(data.area);
                            $('#plotname').val(data.plotname);


                            $('#item_id').val(data.plot_id);

                            $('#add_data_Modal').modal('show');


                        }

                    });
                });
                $(document).on('click', '.book_plot', function() {
                    event.preventDefault();
                    if ($('#totime').val() == "") {
                        alert("Please Enter the totime");
                    } else if ($('#fromtime').val() == '') {
                        alert("from time is required");
                    } else {
                        var moodle = $('#moodle').val();
                        var name = $('#name').val();
                        var plotname = $('#plotname').val();
                        var area = $('#area').val();
                        var totime = $('#totime').val();
                        var fromtime = $('#fromtime').val();
                        var item_id = $('#item_id').val();


                        $.ajax({
                            url: "insert.php",
                            method: "POST",
                            data: {
                                item_id: item_id,
                                moodle: moodle,
                                name: name,
                                plotname: plotname,
                                area: area,
                                totime: totime,
                                fromtime: fromtime
                            },

                            success: function(data) {

                                $('#insert_form')[0].reset();
                                $('#add_data_Modal').modal('hide');

                                $('.alert_errror').html(data);
                                location.reload();

                            }

                        });
                    }

                });



            });

        </script>
    </body>

    </html>

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
            body {
                font-family: Comfortaa;
                font-style: normal;
                font-variant: normal;
            }

            body ::-webkit-input-placeholder {

                color: white;
                font-weight: 300;
            }

            body :-moz-placeholder {

                color: white;
                opacity: 1;
                font-weight: 300;
            }

            body ::-moz-placeholder {

                color: white;
                opacity: 1;
                font-weight: 300;
            }

            body :-ms-input-placeholder {

                color: white;
                font-weight: 300;
            }

            .wrapper {
                background: #27ae60;
                /*
    
  background: -webkit-gradient(linear, left top, right bottom, from(#50a3a2), to(#53e3a6));
  background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
*/
                position: absolute;
                color: white;
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
                        <input type="text" pattern=[0-9]{8} name="moodle" placeholder="Moodle ID" required>
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
