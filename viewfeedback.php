<?php

session_start();
include_once "connection.php";

//check session states

if(!isset($_SESSION['user'])){          //session not remain(Destroyed)
    header("Location: index.php");      //redirect to index page
}

else {

    $userid=$_SESSION['user'];          //session remaining

    $sql = "SELECT * FROM user WHERE user_login_id='$userid' ";//retrieved data from user table

    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);


    $sql_1="SELECT * FROM feedback ORDER BY submission_date DESC"; //retrieved data from feedback table


    $result_feedBack=mysqli_query($conn,$sql_1);

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

    <link href="images/site_logo.jpg" rel="shortcut icon">

    <!--Icons-->
    <script src="js/lumino.glyphs.js"></script>
    <script src="js/jquery-2.2.2.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">

        $(document).on("click", ".open-AddBookDialog", function () {
            var myfeedId  = $(this).data('id');
            var myfeedName=$(this).data('name');
            var myfeedEmail=$(this).data('email');
            var myfeedMessage=$(this).data('message');
            var myfeedImage=$(this).data('image');


            document.getElementById('feedId').innerHTML="FeedBack ID : "+myfeedId;
            document.getElementById('feedName').innerHTML="Sender Name : "+myfeedName;
            document.getElementById('feedEmail').innerHTML="Sender Email : "+myfeedEmail;
            document.getElementById('feedMessage').innerHTML="Sender Message : "+myfeedMessage;
            document.getElementById('feedImage').src=myfeedImage;

//            $(".modal-body #feedId").val(myfeedId);
//            $(".modal-body #feedName").val(myfeedName);
//            $(".modal-body #feedEmail").val(myfeedEmail);
//            $(".modal-body #feedMessage").val(myfeedMessage);
//            $(".modal-body #feedImage").val(myfeedImage);


        });
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $row['userimage'];?>" style="width: 40px;height: 30px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['first_name'];?> <span class="caret"></span></a>
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
        <li><a href="infoupload.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Upload Information</a></li>
        <li><a href="infouploadeddetails.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>View Uploaded Information</a></li>
        <li class="active"><a href="viewfeedback.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg> FeedBack</a></li>
        <li><a href="lock_screen.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Lock Screen</a></li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row left_margin" style="">
        <div class="col-lg-12">
            <h1 class="page-header">View FeedBack</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Feedback Table</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">Feedback Number</th>
                            <th data-field="sname"  data-sortable="true">Sender Name</th>
                            <th data-field="semail" data-sortable="true">Sender Email</th>
                            <th data-field="message" data-sortable="true">Message</th>
                            <th data-field="images" data-sortable="true">Images</th>
                            <th data-field="Date" data-sortable="true">Date & Time</th>
                            <th data-field="state" data-sortable="true"></th>

                        </tr>
                        </thead>

                        <tbody>

                        <?php



                        while(  $row_feedBack=mysqli_fetch_array($result_feedBack)){

                           echo '<tr> <td>'. $row_feedBack['feedback_id'].'</td><td>'
                                           .$row_feedBack['sender_name'].'</td><td>'
                                           .$row_feedBack['sender_email'].'</td><td>'
                                           .$row_feedBack['message'].'</td><td>'
                                           .$row_feedBack['feedback_image_path']
                                            .'</td><td>'.$row_feedBack['submission_date']
                                            ."</td><td><a data-toggle=\"modal\" data-id=\"{$row_feedBack["feedback_id"]}\"
                                                                                data-name=\"{$row_feedBack["sender_name"]}\"
                                                                                data-email=\"{$row_feedBack["sender_email"]}\"
                                                                                data-message=\"{$row_feedBack["message"]}\"
                                                                                data-image=\"{$row_feedBack["feedback_image_path"]}\"


                                            .title=\"Add this item\" class=\"open-AddBookDialog btn btn-primary\" href=\"#addBookDialog\">"
                                            .'view'.'</a></td></tr>';
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->


    <!-- Modal -->
    <div id="addBookDialog" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4CAF50;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="text-center" style="color: #ffffff;">FeedBack Details</h3>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <h5  id="feedId" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="feedName" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="feedEmail" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="feedMessage" class="text-danger" style="margin-top: 10px;margin-left: 10px;"></h5>
                    </div>



                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-10"><img id="feedImage" alt="Feedback Image" class="img-responsive" style="width: 640px;height: 480px; " ></div>
                        <div class="col-md-1"></div>


                    </div>


<!--                    <input type="text" name="feedId" id="feedId" value=""/>-->
<!--                    <input type="text" name="feedName" id="feedName" value=""/>-->
<!--                    <input type="text" name="feedEmail" id="feedEmail" value=""/>-->
<!--                    <input type="text" name="feedMessage" id="feedMessage" value=""/>-->
<!--                    <input type="text" name="feedImage" id="feedImage" value=""/>-->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<!-- ModelEnd-->

    <script>
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
