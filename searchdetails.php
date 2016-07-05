<?php

$inf_id=$_GET['id'];

include_once"connection.php";

$sql_select_info="SELECT * FROM information WHERE info_id=$inf_id ";

$result=mysqli_query($conn,$sql_select_info);

$row_info=mysqli_fetch_array($result);

//info_id, plant_type, plant_name, disease_name, disease_type, date, symtoms, details_symtoms, solution, image, user_login_id, tags



?>
<!DOCTYPE html>
<html>
<head>
    <title>Agro-Clinic-Search Details</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style_Home.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/Login.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/serach.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet" media="all">

    <link href="images/site_logo.jpg" rel="shortcut icon">
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Crops Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //Custom Theme files -->
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.MultiFile.js"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/search.js"></script>

    <style>
        .info_details{
            margin-top: 15px;;
        }
         body{
             font-size: 16px;;
         }
    </style>

</head>
<body>

<div style="padding: 2em 0;">
    <div class="container">
        <h3 class="title">(<?php echo $row_info['plant_name'] ?>-<?php echo $row_info['disease_name'] ?> )</h3>
        <p class="text-danger info_details">* If you have this kind of Symptoms then you need to meet your agriculture field officer immediately</p>
        <div class="contact-form">
                <div class="row">
                    <div class="col-md-6" class="cnt-inpt">
                        <p class="text-primary text-right">Plant Name : </p>
                    </div>
                    <div class="col-md-6 " class="cnt-inpt">
                        <p><?php echo $row_info['plant_name'] ?></p>
                    </div>
                </div>
                <div class="row info_details">
                    <div class="col-md-6" class="cnt-inpt">
                        <p class="text-primary text-right">Plant Type : </p>
                    </div>
                    <div class="col-md-6 " class="cnt-inpt">
                        <p><?php echo $row_info['plant_type'] ?></p>
                    </div>
                </div>
                <div class="row info_details">
                    <div class="col-md-6" class="cnt-inpt">
                        <p class="text-primary text-right">Problem : </p>
                    </div>
                    <div class="col-md-6 " class="cnt-inpt">
                        <p><?php echo $row_info['disease_type'] ?></p>
                    </div>
                </div>
                <div class="row info_details">
                    <div class="col-md-6" class="cnt-inpt">
                        <p class="text-primary text-right">Disease Name : </p>
                    </div>
                    <div class="col-md-6 " class="cnt-inpt">
                        <p><?php echo $row_info['disease_name'] ?></p>
                    </div>
                </div>
                <div class="row info_details">
                    <div class="col-md-6" class="cnt-inpt">
                        <p class="text-primary text-right">Symptoms : </p>
                    </div>
                    <div class="col-md-6 " class="cnt-inpt">
                        <p><?php echo $row_info['symtoms'] ?></p>
                    </div>
                </div>
                <div class="row info_details">
                    <div class="col-md-6" class="cnt-inpt">
                        <p class="text-primary text-right">Details of the Symptoms : </p>
                    </div>
                    <div class="col-md-6 " class="cnt-inpt">
                        <p><?php echo $row_info['details_symtoms'] ?></p>
                    </div>
                </div>
                <div class="row info_details">
                    <div class="col-md-6" class="cnt-inpt">
                        <p class="text-primary text-right">Solution : </p>
                    </div>
                    <div class="col-md-6 " class="cnt-inpt">
                        <p><?php echo $row_info['solution'] ?></p>
                    </div>
                </div>
                 <div class="row info_details">
                    <div class="col-md-6" class="cnt-inpt">
                        <p class="text-primary text-right">Sample Image : </p>
                    </div>
                    <div class="col-md-6 " class="cnt-inpt">
                       <img src="<?php echo $row_info['image'] ?>" alt="Sample Image" class="img-responsive" style="width: 300px;height: 200px;">
                    </div>
                </div>

        </div>
    </div>
</div>
<!--//contact-->

<div class="copy">
    <div class="container">
        <div class="copy-left">
            <p>Copyright © 2016 Agro-Clinic Developer Team</p>
        </div>
    </div>
</div>
<!--//footer-->
<!--smooth-scrolling-of-move-up-->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!--//smooth-scrolling-of-move-up-->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.js"></script>
</body>
</html>