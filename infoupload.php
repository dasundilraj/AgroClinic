<?php

session_start();
include_once "connection.php";


if(!isset($_SESSION['user'])){
    header("Location: index.php");
}

else {

    $userid = $_SESSION['user'];

    $sql = "SELECT * FROM user WHERE user_login_id='$userid' ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    //information upload
    if(isset($_POST['plant_name'])&&isset($_POST['plant_type'])&&isset($_POST['disease_name'])&&isset($_POST['disease_type'])&&isset($_POST['symtoms'])&&isset($_POST['details'])&&isset($_POST['solution'])&&isset($_FILES["info_sample_image"]["name"])){

        if(!empty($_FILES["info_sample_image"]["name"])){

            $plant_name=$_POST['plant_name'];
            $plant_type=$_POST['plant_type'];
            $disease_name=$_POST['disease_name'];
            $disease_type=$_POST['disease_type'];
            $symtoms=$_POST['symtoms'];
            $details=$_POST['details'];
            $solution=$_POST['solution'];

            $tags=$plant_name." ( ".$plant_type." )"." has ".$disease_name." ( ".$disease_type." )";

           // echo '<script type="text/javascript">alert($plant_name);</script>';

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

            $file_name=$_FILES["info_sample_image"]["name"];        //image details
            $temp_name=$_FILES["info_sample_image"]["tmp_name"];
            $imgtype=$_FILES["info_sample_image"]["type"];
            $ext= GetImageExtension($imgtype);
            $imagename=date("d-m-Y")."-".time().$ext;
            $target_path = "uploadImage/infouploadimage/".$imagename;

            if(move_uploaded_file($temp_name, $target_path)) {

                $sql_Upload_query_01="INSERT INTO information (plant_type, plant_name, disease_name, disease_type, date, symtoms, details_symtoms, solution, image,user_login_id,tags) VALUES ('$plant_type','$plant_name','$disease_name','$disease_type','".date("Y-m-d H:i:s")."','$symtoms','$details','$solution','$target_path','$userid','$tags')";

                $result_1=mysqli_query($conn, $sql_Upload_query_01);

                if(!$result_1){
                    echo mysqli_error($conn);
                    echo '  <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-md-8">
                         <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             <h5 class="text-center"><strong>Sorry there was an error in connection or server! Please Try again later......</h5>
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
                         <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             <h5 class="text-center"><strong>Your information uploaded successfully...... </strong> </h5>
                        </div>
                    </div>
                   <div class="col-md-2"></div>
               </div>
               ';
                }



            }
            else {

                exit("Error While uploading image on the server");
            }

        }
        else{
            echo "Please Select Image";
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
    <link href="css/datepicker.css" rel="stylesheet">
    <link href="css/styles_Admin.css" rel="stylesheet">
    <link href="css/style_Home.css" type="text/css" rel="stylesheet" media="all">

    <link href="images/site_logo.jpg" rel="shortcut icon">

    <!--Icons-->
    <script src="js/lumino.glyphs.js"></script>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $row['userimage'];?>" style="width: 40px;height: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['first_name'];?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="editprofile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
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
        <li class="active"><a href="infoupload.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Upload Information</a></li>
        <li><a href="infouploadeddetails.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> View Uploaded Information</a></li>
        <li><a href="viewfeedback.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg> FeedBack</a></li>
        <li><a href="lock_screen.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Lock Screen</a></li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row left_margin">
        <div class="col-lg-12">
            <h1 class="page-header">Upload Information</h1>
        </div>
    </div><!--/.row-->

    <div class="row left_margin">
        <div class="col-lg-12">
            <div class="contact-form">
                <form method="post" action="" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6 " class="cnt-inpt">
                            <input type="text" name="plant_name" placeholder="Plant Name" required="">
                        </div>
                        <div class="col-md-6 " class="cnt-inpt">
                            <input type="text" name="plant_type" placeholder="Plant Type" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 " class="cnt-inpt">
                            <input type="text" name="disease_name" placeholder="Disease Name" required="">
                        </div>
                        <div class="col-md-6 " class="cnt-inpt">
                            <input type="text" name="disease_type" placeholder="Disease Type" required="">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 " class="cnt-inpt">
                            <input type="text" name="symtoms" placeholder="Symptoms" required="">
                        </div>
                        <div class="col-md-6 " class="cnt-inpt">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="cnt-label">Description About the Symptoms...</label>
                            <textarea name="details"  required=""></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="cnt-label">Solution For the Issue...</label>
                            <textarea  name="solution" required=""> </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3" class="cnt-inpt">
                            <label class="cnt-label">Sample Images</label>
                            <input type="file" name="info_sample_image" multiple="" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" >
                            <img id="sample_image"  src="images/placeholder.png" alt="your image" />
                        </div>
                        <div class="col-md-6 " class="cnt-inpt"></div>
                    </div>


                    <input type="submit" value="Submit">

                </form>
            </div>
        </div>
    </div><!--/.row-->


</div>	<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script type="text/javascript">

    function readURL(input) {                                           //function image chooser
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#sample_image')
                    .attr('src', e.target.result)
                    .width(350)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function () {
        $('#datetimepicker').datetimepicker();
    });


    //                                $('#calendar').datepicker({
    //                                });
    //
    //                                !function ($) {
    //                                    $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
    //                                        $(this).find('em:first').toggleClass("glyphicon-minus");
    //                                    });
    //                                    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    //                                }(window.jQuery);
    //
    //                                $(window).on('resize', function () {
    //                                    if ($(window).width() > 768)
    //                                        $('#sidebar-collapse').collapse('show')
    //                                })
    //                                $(window).on('resize', function () {
    //                                    if ($(window).width() <= 767)
    //                                        $('#sidebar-collapse').collapse('hide')
    //                                })
</script>
</body>

</html>
