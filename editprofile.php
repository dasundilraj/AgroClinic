<?php

session_start();

//check session states

if(!isset($_SESSION['user'])){          //session not remain(Destroyed)
    header("Location: index.php");      //redirect to index page
}
else {

    $userid=$_SESSION['user'];          //session remaining
    include_once "connection.php";

    $sql = "SELECT * FROM user WHERE user_login_id='$userid' ";//retrieved data from user table

    $sql1 = "SELECT * FROM user_login WHERE id='$userid' ";//retrieved data from user_login table

    $result=mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);

    $result1=mysqli_query($conn,$sql1);

    $row1 = mysqli_fetch_array($result1);

    if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['conf_password'])&&isset($_POST['contact'])&&isset($_POST['designation'])&&isset($_FILES["uploadedimage"]["name"])){


            if (!empty($_FILES["uploadedimage"]["name"])) {

                $fname=$_POST['fname'];
                $uname=$_POST['lname'];
                $pwd=$_POST['conf_password'];
                $cnt=$_POST['contact'];
                $designation=$_POST['designation'];

                function GetImageExtension($imagetype)              //select image type
                {
                    if(empty($imagetype)) return false;
                    switch($imagetype)
                    {
                        case 'image/bmp': return '.bmp';
                        case 'image/gif': return '.gif';
                        case 'image/jpeg': return '.jpg';
                        case 'image/png': return '.png';
                        default: return false;
                    }
                }

                $file_name=$_FILES["uploadedimage"]["name"];        //image details
                $temp_name=$_FILES["uploadedimage"]["tmp_name"];
                $imgtype=$_FILES["uploadedimage"]["type"];
                $ext= GetImageExtension($imgtype);
                $imagename=date("d-m-Y")."-".time().$ext;
                $target_path = "uploadImage/userimage/".$imagename;



                if(move_uploaded_file($temp_name, $target_path)) {

                    $updateSql="UPDATE user SET first_name='$fname', last_name='$uname',designation='$designation', contact_no=' $cnt',userimage='$target_path' WHERE user_login_id='$userid' ";

                    $updateSqltemp="UPDATE user_login SET password='$pwd' WHERE id='$userid' ";

                    if (mysqli_query($conn, $updateSql)&&mysqli_query($conn, $updateSqltemp)) {

                        echo '  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h5 class="text-center"><strong>Successfully Updated.........</strong></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                ';

                    }
                    else{

                        echo '  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                         <h5 class="text-center"><strong>Sorry there was an error in Updating........</strong>&nbsp;&nbsp;&nbsp;Please try again later......</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            ';

                    }

                }

            }

    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agro-Clinic-Admin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-table.css" rel="stylesheet">
    <link href="css/styles_Admin.css" rel="stylesheet">
    <link href="css/style_Home.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/StrengthChecker.css" type="text/css" rel="stylesheet" media="all">

    <link href="images/site_logo.jpg" rel="shortcut icon">

    <!--Icons-->

    <!-- start-smoth-scrolling-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>

    <script src="js/lumino.glyphs.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.MultiFile.js"></script>

    <script type="text/javascript">

    function passwordStrength(password)     //Password Strength Checker
    {
    var desc = new Array();
    desc[0] = "Very Weak";
    desc[1] = "Weak";
    desc[2] = "Better";
    desc[3] = "Medium";
    desc[4] = "Strong";
    desc[5] = "Strongest";

    var score   = 0;

    //if password bigger than 6 give 1 point
    if (password.length > 6) score++;

    //if password has both lower and uppercase characters give 1 point
    if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

    //if password has at least one number give 1 point
    if (password.match(/\d+/)) score++;

    //if password has at least one special caracther give 1 point
    if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;

    //if password bigger than 12 give another 1 point
    if (password.length > 12) score++;

    document.getElementById("passwordDescription").innerHTML = desc[score];
    document.getElementById("passwordStrength").className = "strength" + score;

    }
    </script>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $row['userimage'];?>" style="width: 40px;height: 30px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['first_name']?>  <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="editprofile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                        <li><a href="index.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
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
        <li><a href="infoupload.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Upload Information</a></li>
        <li><a href="infouploadeddetails.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>View Uploaded Information</a></li>
        <li><a href="viewfeedback.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg> FeedBack</a></li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row left_margin">
        <div class="col-lg-12">
            <h1 class="page-header text-left">Edit Profile</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="container" style="padding-top: 60px;">
                    <div class="row">

<!--                        <!-- edit form column -->
                        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

                            <h3>Personal info</h3>
                            <p class="text-danger" style="margin-top: 10px;">* &nbsp;&nbsp; Note: You Can't Change Your Email</p>
                            <div class="contact-form">
                                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label ">First name:</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input class="form-control" type="text" value=" <?php echo $row['first_name']?> " name="fname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Last name:</label>
                                        <div class="col-lg-8 cnt-inpt" >
                                            <input class="form-control"  type="text" value=" <?php echo $row['last_name']?> " name="lname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Email</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input class="form-control" type="text" value="<?php echo $row1['user_name']?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">New Password</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input type="password" id="password" name="password" placeholder="Password" required="" onkeyup="passwordStrength(this.value)">
                                            <div id="passwordDescription" class="confirmMessage col-md-4"><label style="color: #84904B;font-size: 14px;">Password Strength :</label></div>
                                            <div id="passwordStrength" class="strength0 col-md-8" style="margin-top:5px;" ></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Confirm Password</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input type="password" id="conf_password" name="conf_password" placeholder="Confirm Password" required="" onkeyup="checkPass()">
                                            <div id="confirmMessage" class="confirmMessage"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Contact Number</label>
                                        <div class="col-md-8 cnt-inpt">
                                            <input class="form-control" value="<?php echo $row['contact_no']?>" type="text" name="contact">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Designation</label>
                                        <div class="col-md-8 cnt-inpt">
                                            <input class="form-control" value="<?php echo $row['designation']?>"  type="text" name="designation">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Profile Picture</label>
                                        <div class="col-md-8 cnt-inpt">
                                            <img id="userprofile" src="<?php echo $row['userimage']?>" class="avatar img-thumbnail" alt="profile picture" style="width: 300px;height: 200px;" multiple="" >
                                            <input type="file" name="uploadedimage"  multiple="" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" required>
                                        </div>
                                    </div>
<!--                                    //user_id, first_name, last_name, designation, contact_no, userimage, user_login_id-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-8">
                                            <input type="submit" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <script>

        function readURL(input) {                                           //function image chooser
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#userprofile')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }





        $(function () {
            $('#hover, #striped, #condensed').click(function () {
                var classes = 'table';

                if ($('#hover').prop('checked')) {
                    classes += ' table-hover';
                }
                if ($('#condensed').prop('checked')) {
                    classes += ' table-condensed';
                }
                $('#table-style').bootstrapTable('destroy')
                    .bootstrapTable({
                        classes: classes,
                        striped: $('#striped').prop('checked')
                    });
            });
        });

        function rowStyle(row, index) {
            var classes = ['active', 'success', 'info', 'warning', 'danger'];

            if (index % 2 === 0 && index / 2 < classes.length) {
                return {
                    classes: classes[index / 2]
                };
            }
            return {};
        }
    </script>

</div><!--/.main-->

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
