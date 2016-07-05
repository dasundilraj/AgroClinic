<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
else {

    $userid = $_SESSION['user'];
    $username= $_SESSION['user_name'];
    include_once "connection.php";

//    //User Account Create
    if(isset($_POST['first_name'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['designation'])) {

        $FirstName = $_POST["first_name"];
       // $LastName = $_POST["last_name"];
        $Email = $_POST["email"];
        $Password = $_POST["conf_password"];
        $Designation = $_POST["designation"];
       // $ContactNo = (int)($_POST["contact_number"]);

        $sql_quary = "SELECT user_name FROM user_login WHERE user_name='$Email'";// search for the username is exist.

        $result = mysqli_query($conn, $sql_quary);


        if (mysqli_num_rows($result)==0) {                                       // user name not exist do this

            // value insert quary for both tables

            $sql_quary1 = "INSERT INTO user_login(user_name,password) VALUES ('$Email','$Password')";

            $sql_quary2 = "INSERT INTO user(first_name,last_name,designation,contact_no,user_login_id) VALUES ('$FirstName','','$Designation','',LAST_INSERT_ID())";


            if (mysqli_query($conn, $sql_quary1) && mysqli_query($conn, $sql_quary2)) {
                //header('Location: index.php');
                echo '  <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-md-8">
                         <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             <h5 class="text-center"><strong>Successfully Account Created.........</strong></h5>
                        </div>
                    </div>
                   <div class="col-md-2"></div>
               </div>
               ';

            } else

                echo '  <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-md-8">
                         <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             <h5 class="text-center"><strong>Sorry there was an error in Registration........</strong>&nbsp;&nbsp;&nbsp;Please try again later......</h5>
                        </div>
                    </div>
                   <div class="col-md-2"></div>
               </div>
               ';
        }
        else                                                             // other wise do this
            echo '  <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-md-8">
                         <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             <h5 class="text-center"><strong>Sorry  Email is Exist</strong>&nbsp;&nbsp;&nbsp;Please try again with another Email..........</h5>
                        </div>
                    </div>
                   <div class="col-md-2"></div>
               </div>
               ';
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agro-Clinic-Admin</title>

    <title>Agro-Clinic-Admin</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style_Home.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/Login.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/test.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/styles_Admin.css" rel="stylesheet">
    <link href="css/StrengthChecker.css" type="text/css" rel="stylesheet" media="all">

    <link href="images/site_logo.jpg" rel="shortcut icon">

    <!--Icons-->
    <script src="js/lumino.glyphs.js"></script>
    <script src="js/jquery-2.2.2.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>


    <script type="text/javascript">

        function checkPass(){                               //Password match
            var pass1=document.getElementById("password");
            var pass2=document.getElementById("conf_password");

            var message=document.getElementById("confirmMessage");

            var goodColor = "#66cc66";
            var badColor = "#ff6666";


            if(pass1.value==pass2.value){
//                pass2.style.backgroundColor = goodColor;
                message.style.color = goodColor;
                message.innerHTML = "Passwords Match !"
            }
            else{
//                pass2.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "Passwords Do Not Match !"
            }
        }

    </script>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Agro&nbsp;&nbsp;</span>Clinic Online Facility</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo  $username;?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="logout.php?logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li><a href="main_admin_dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
        <li class="active" ><a href="create_user_accounts.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>User Accounts</a></li>
        <li ><a href="main_admin_infodetails.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>view Uploaded Information</a></li>
        <li><a href="main_admin_feed_details.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> View Feedback Information</a></li>
        <li><a href="main_admin_report_generate.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg> Report Generate</a></li>
        <li><a href="main_admin_lock_screen.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Lock Screen</a></li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row left_margin">
        <div class="col-md-10">
            <h1 class="page-header text-left">Create User Accounts </h1>

        </div>
        <div class="col-md-2">
            <a class="btn btn-success" href="view_user_accounts.php">view user accounts</a
        </div>
    </div><!--/.row-->

    <div class="row left_margin" >
        <div class="col-lg-12">
            <p class="text-danger">* &nbsp;&nbsp; All fields are required</p>
            <div class="contact-form">
                <form method="post" action="">

                    <div class="row">
                        <div class="col-md-6 " class="cnt-inpt">
                            <input type="text" name="first_name" placeholder="First Name" required="">
                        </div>
                        <div class="col-md-6 " class="cnt-inpt">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 " class="cnt-inpt">
                            <input type="text" name="email" placeholder="Email" required="">
                        </div>
                        <div class="col-md-6 " class="cnt-inpt"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 " class="cnt-inpt">
                            <input type="password" id="password" name="password" placeholder="Password" required="">
                        </div>
                        <div class="col-md-6 " class="cnt-inpt">
                            <input type="password" id="conf_password" name="conf_password" placeholder="Confirm Password" required="" onkeyup="checkPass()">
                            <div id="confirmMessage" class="confirmMessage"></div>
                            <!-- <div id="confirmMessage" class="confirmMessage"></div> -->
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-6 " class="cnt-inpt">
                            <input type="text" name="designation" placeholder="Designation" required="">
                        </div>
                        <div class="col-md-6 " class="cnt-inpt">
                        </div>
                    </div>


                    <input type="submit" value="Submit">

                </form>
            </div>
        </div>
    </div><!--/.row-->



</div><!--/.main-->
<script src="js/jquery-2.2.2.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-table.js"></script>
<script>
    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768)
            $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767)
            $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>