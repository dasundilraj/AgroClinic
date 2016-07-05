
<!DOCTYPE html>
<html>
<head>
    <title>Agro-Clinic-AboutUS</title>
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
    <script src="js/search.js"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {                               //scroll function
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });

        $(function () {                                                     //search popup function
            $('input[href="#search"]').on('click', function (event) {
                event.preventDefault();
                $('#search').addClass('open');
                $('#search > form > input[type="search"]').focus();
            });

            $('#search, #search button.close').on('click keyup', function (event) {
                if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                    $(this).removeClass('open');
                }
            });


            //Do not include! This prevents the form from submitting for DEMO purposes only!
            $('serchForm').submit(function (event) {
                event.preventDefault();
                return false;
            })
        });
    </script>
    <!--//end-smoth-scrolling-->
</head>
<body>
<!-- Search Popup-->
<div id="search" style="background-color: rgba(0,0,0,0.95)">
    <button type="button" class="close">CLOSE</button>
    <form id="serchForm">
        <input type="search" value="" placeholder="Find solutions for your crop problems" onkeyup="showResult(this.value)" />
        <li  class="text-center" style="margin-top:500px;display: block;font-size: 35px;padding: 0;color: #ffffff;" id="livesearch" >
            <!--             <a id="livesearch"  style="text-decoration: none;color: #fff;cursor: pointer;" id="livesearch" ></a>-->
        </li>

    </form>
</div>
<!-- //Search Popup-->
<!--header-->
<div class="logo">
    <div class="container">
        <div class="logo-info">
            <a href="index.php">
                <h1>Agro-Clinic Online Facility</h1>
            </a>
        </div>
    </div>
</div>
<!--//header-->
<!--navigation-->
<div class="top-nav">
    <nav class="navbar navbar-default">
        <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="hvr-bounce-to-bottom"><a href="index.php">Home</a></li>
                <li class="hvr-bounce-to-bottom active"><a href="about.php">About</a></li>
                <li class="hvr-bounce-to-bottom"><a href="feedback.php">FeedBack</a></li>
                <li class="hvr-bounce-to-bottom"><a href="contact.php">Contact Us</a></li>

                <li class="dropdown hvr-bounce-to-bottom  topnav">
                    <a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row" >
                                <div class="col-md-12">
                                    <p class="login_para">Login &nbsp;&nbsp; <span class="text-center text-danger">(Only Authenticated Staff)</span></p>
                                    <form class="form"  method="post" action="userlogin.php" accept-charset="UTF-8" id="login-nav">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                            <input type="email" class="form-control" id="login_email" name="login_email" placeholder="Email address" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                                            <input type="password" class="form-control" id="login_password" name="login_password" placeholder="Password" required>
                                            <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> keep me logged-in
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <div class="bottom text-center">
<!--                                    New here ? <a href="signup.php"><b>Join Us</b></a>-->
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
    </nav>
</div>
<!--//navigation-->

<!--Search Option-->

<div class="about-slid ">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form class="form-inline">
            <div class=" input-group" style="margin-top: 10px;width: 100%;">
                <input type="text" class="form-control text-center"  href="#search" placeholder="Find solutions for your crop problems" style="height: 40px;font-size: 1.5em;">
                            <span class="input-group-addon" style="background-color:#4CAF50;height: 40px;">
                                <i class="fa fa-search "></i>
                            </span>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
</div>

<!--//Search Option-->
<div class="about" style="padding: 0em;">
    <h3 class="title">About Us</h3>
</div>

<!--about-->
<div class="about">
    <div class="container-fluid">

                <div class="page2-slid ">
                    <div class="container">
                        <div class="page2-slid-info">
                            <h2 style="margin-top: 20px;">Agro-Clinic Online Facility - ACOF</h2>
                            <h4>Agro-Clinic Online Facility - ACOF is a centralized online solution for crop pest management to support Sri Lanka agriculture industry. This site is designed as working model of online crop clinic system and it is designed and developed with a research for the final project of bachelor degree.</h4>
                        </div>
                    </div>
                </div>
                <hr>
        
        <div class="about-slid ">
        <div class="container">
            <div class="about-slid-info">
                <h2>Our Mission</h2>
                <h4>The mission of the "Agro-Clinic Online Facility" is to deliver accurate, sensible solutions and supervisory references to plant health inquiries and complications met by the nations of Sri Lanka.</h4>
            </div>
        </div>
    </div>




<!-- footer -->
<div class="footer" style="margin-top: 20px;">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-8 footer-grid">
                <h3 class="title">More details</h3>
                <ul>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="contact.php">Site map</a></li>
                </ul>
            </div>
            <div class="col-md-4 footer-grid contact-grid">
                
                <ul>

                    <li><h4>Pioneer Institute of Business & Technology</h4> <p>51, Flower Road, Colombo-07,</p> <p>Sri Lanka.</p></li>
                    <p></p>
                    <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:live.mashood@gmail.com">live.mashood@gmail.com</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
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