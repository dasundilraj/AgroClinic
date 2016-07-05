
<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
else {

    $userid = $_SESSION['user'];
    $username= $_SESSION['user_name'];
    include_once "connection.php";

    $id=$_GET['id'];

    $sql="SELECT * FROM information WHERE info_id='$id'";

    $result_information=mysqli_query($conn,$sql);

    $row_info=mysqli_fetch_array($result_information);

    if(isset($_POST['plant_name'])&&isset($_POST['plant_type'])&&isset($_POST['disease_name'])&&isset($_POST['disease_type'])&&isset($_POST['symtoms'])&&isset($_POST['details_symtoms'])&&isset($_POST['solution'])){

//        &&isset($_FILES["uploadedimage"]["name"])
                $plant_name=$_POST['plant_name'];
                $plant_type=$_POST['plant_type'];
                $disease_name=$_POST['disease_name'];
                $disease_type=$_POST['disease_type'];
                $symtoms=$_POST['symtoms'];
                $details_symtoms=$_POST['details_symtoms'];
                $solution=$_POST['solution'];
                $tags=$plant_name." ( ".$plant_type." )"." has ".$disease_name." ( ".$disease_type." )";

                $temp=$_FILES["uploadedimage"]["name"];

        if($temp==NULL){

            $target_path=$row_info['image'];

            $updateSql="UPDATE information SET plant_type='$plant_type', plant_name='$plant_name',disease_name='$disease_name', disease_type='$disease_type',date='".date("Y-m-d H:i:s")."',symtoms='$symtoms',details_symtoms='$details_symtoms',solution='$solution',image='$target_path',tags='$tags' WHERE info_id='$id' ";

            if (mysqli_query($conn, $updateSql)) {

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

        else{

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
            $target_path = "uploadImage/infouploadimage/".$imagename;


        move_uploaded_file($temp_name, $target_path);

           $updateSql="UPDATE information SET plant_type='$plant_type', plant_name='$plant_name',disease_name='$disease_name', disease_type='$disease_type',date='".date("Y-m-d H:i:s")."',symtoms='$symtoms',details_symtoms='$details_symtoms',solution='$solution',image='$target_path',tags='$tags' WHERE info_id='$id' ";

            if (mysqli_query($conn, $updateSql)) {

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
        <li ><a href="create_user_accounts.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>User Accounts</a></li>
        <li  class="active" ><a href="main_admin_infodetails.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>view Uploaded Information</a></li>
        <li><a href="main_admin_feed_details.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> View Feedback Information</a></li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row left_margin">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Uploaded  Information</h1>
        </div>
    </div><!--/.row-->


    <div class="row left_margin">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="container">
                    <div class="row">

                     <!-- edit information column -->

                            <div class="contact-form">
                                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label ">Plant Name :</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input class="form-control" type="text" value=" <?php echo $row_info['plant_name']?> " name="plant_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label ">Plant Type :</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input class="form-control" type="text" value=" <?php echo $row_info['plant_type']?> " name="plant_type">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label ">Disease Name :</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input class="form-control" type="text" value=" <?php echo $row_info['disease_name']?> " name="disease_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label ">Disease Type :</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input class="form-control" type="text" value=" <?php echo $row_info['disease_type']?> " name="disease_type">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label ">Symptoms :</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input class="form-control" type="text" value=" <?php echo $row_info['symtoms']?> " name="symtoms">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label ">Description About the Symptoms :</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input class="form-control" type="text" value=" <?php echo $row_info['details_symtoms']?> " name="details_symtoms">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label ">Solution For the Issue :</label>
                                        <div class="col-lg-8 cnt-inpt">
                                            <input class="form-control" type="text" value=" <?php echo $row_info['solution']?> " name="solution">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label ">Sample Image :</label>
                                        <div class="col-lg-8 cnt-inpt">
<!--                                            <input type="text" value="--><?php //echo $row_info['image']?><!--" name="exist_image" style="display: none;">-->
                                            <input type="file" name="uploadedimage" multiple="" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);">
                                            <img id="sample_image" class="img-responsive"  src="<?php echo $row_info['image']?>" alt="No Uploaded Image" style="width:340px;height: 220px;" / >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-8 control-label"></label>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-success">Edit Uploaded Information</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

</script>
</body>

</html>
