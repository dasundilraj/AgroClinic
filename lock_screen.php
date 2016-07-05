<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
else {

    if(isset($_POST["log_screen_pwd"])){
        $log_pwd=$_POST["log_screen_pwd"];

        if( $_SESSION['user_pwd']==$log_pwd){
            header("Location:infoupload.php");
        }

        else{
            echo '  <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-md-8">
                         <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             <h5 class="text-center">Invalid Password</h5>
                        </div>
                    </div>
                   <div class="col-md-2"></div>
               </div>
               ';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link href="images/site_logo.jpg" rel="shortcut icon">

    <title>AgroClinic-Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/lock_screen.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="lock-screen" onload="startTime()">

<div class="lock-wrapper">

    <div id="time"></div>


    <div class="lock-box text-center">
        <img src="images/adimin_image.png" alt="lock avatar"/>
        <h1><?php echo $_SESSION['normal_user_uname']; ?></h1>
        <span class="locked">Locked</span>
        <form role="form" class="form-inline" action="" method="post">
            <div class="form-group col-lg-12">
                <input type="password" placeholder="Password" id="log_screen_pwd"  name="log_screen_pwd" class="form-control lock-input">
                <button class="btn btn-lock" type="submit">
                    <i class="fa fa-arrow-right"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function startTime()
    {
        var today=new Date();
        var h=today.getHours();
        var m=today.getMinutes();
        var s=today.getSeconds();
        // add a zero in front of numbers<10
        m=checkTime(m);
        s=checkTime(s);
        document.getElementById('time').innerHTML=h+":"+m+":"+s;
        t=setTimeout(function(){startTime()},500);
    }

    function checkTime(i)
    {
        if (i<10)
        {
            i="0" + i;
        }
        return i;
    }
</script>
</body>
</html>
