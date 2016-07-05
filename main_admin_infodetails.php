<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
else {

    $userid = $_SESSION['user'];
    $username= $_SESSION['user_name'];
    include_once "connection.php";

    $sql_1="SELECT * FROM information ORDER BY date DESC";

    $result_information=mysqli_query($conn,$sql_1);
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
            var infoId  = $(this).data('id');
            var plant_type=$(this).data('ptype');
            var plant_name=$(this).data('pname');
            var disease_name=$(this).data('dname');
            var disease_type =$(this).data('dtype');
            var infodate=$(this).data('date');
            var symtoms=$(this).data('symtoms');
            var details_symtoms=$(this).data('detsymtoms');
            var details_solution=$(this).data('solution');
            var image=$(this).data('image');


            document.getElementById('infoId').innerHTML="Uploaded Admin ID : "+infoId;
            document.getElementById('plant_type').innerHTML="Plant Type : "+plant_type;
            document.getElementById('plant_name').innerHTML="Plant Name : "+plant_name;
            document.getElementById('disease_name').innerHTML="Disease Name : "+disease_name;
            document.getElementById('disType').innerHTML="Disease Type : "+disease_type;
            document.getElementById('infodate').innerHTML="Date : "+infodate;
            document.getElementById('symtoms').innerHTML="Symptoms : "+symtoms;
            document.getElementById('details_symtoms').innerHTML="Symptoms Details : "+details_symtoms;
            document.getElementById('details_solution').innerHTML="Symptoms Details : "+details_solution;
            document.getElementById('infoImage').src=image;

        });

        function updateInformation(info_id){
            window.location.href = "update_information.php?id="+info_id;
        }

        function deleteInformation(info_id){
            var r = confirm("Are You Sure want to Delete User....?");

            if(r == true){
                //document.getElementById("test").innerHTML=user_id;

                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        window.location.reload();
                        //document.getElementById("notify_delete").innerHTML=xmlhttp.responseText;

                    }
                }
                xmlhttp.open("GET","delete_info.php?id="+info_id,true);
                xmlhttp.send();

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
        <li ><a href="create_user_accounts.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>User Accounts</a></li>
        <li  class="active" ><a href="main_admin_infodetails.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>view Uploaded Information</a></li>
        <li><a href="main_admin_feed_details.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> View Feedback Information</a></li>
        <li><a href="main_admin_report_generate.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg> Report Generate</a></li>
        <li><a href="main_admin_lock_screen.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Lock Screen</a></li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row left_margin" style="">
        <div class="col-lg-12">
            <h1 class="page-header">View All Uploaded Information</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Information Table</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="user_id" data-sortable="true">Admin ID</th>
                            <th data-field="id" data-sortable="true">Plant Type</th>
                            <th data-field="sname"  data-sortable="true">Plant Name</th>
                            <th data-field="semail" data-sortable="true">Disease Name</th>
                            <th data-field="message" data-sortable="true">Disease Type</th>
                            <th data-field="images" data-sortable="true">Symptoms</th>
                            <th data-field="Date" data-sortable="true">Date & Time</th>
                            <th data-field="state" data-sortable="true"></th>
                            <th data-field="Update State" data-sortable="true"></th>
                            <th data-field="Delete" data-sortable="true"></th>

                        </tr>
                        </thead>

                        <tbody>

                        <?php

                        //info_id, plant_type, plant_name, disease_name, disease_type, date, symtoms, details_symtoms, solution, image, user_login_id

                        while(  $row_info=mysqli_fetch_array($result_information)){


                            echo '<tr> <td>'. $row_info['user_login_id'].'</td><td>'
                                . $row_info['plant_type'].'</td><td>'
                                .$row_info['plant_name'].'</td><td>'
                                .$row_info['disease_name'].'</td><td>'
                                .$row_info['disease_type'].'</td><td>'
                                .$row_info['symtoms']
                                .'</td><td>'.$row_info['date']
                                ."</td><td><a data-toggle=\"modal\" data-id=\"{$row_info["user_login_id"]}\"
                                                                    data-ptype=\"{$row_info["plant_type"]}\"
                                                                    data-pname=\"{$row_info["plant_name"]}\"
                                                                    data-dname=\"{$row_info["disease_name"]}\"
                                                                    data-dtype=\"{$row_info["disease_type"]}\"
                                                                    data-date=\"{$row_info["date"]}\"
                                                                    data-symtoms=\"{$row_info["symtoms"]}\"
                                                                    data-detsymtoms=\"{$row_info["details_symtoms"]}\"
                                                                    data-solution=\"{$row_info["solution"]}\"
                                                                    data-image=\"{$row_info["image"]}\"
                                            .title=\"Add this item\" class=\"open-AddBookDialog btn btn-primary\" href=\"#addBookDialog\">".'View'.'</a></td>'
                                ."</td><td><a class=\"open-AddBookDialog btn btn-success\" onclick=\"updateInformation({$row_info["info_id"]})\">" .'Update'.'</a></td>'
                                ."</td><td><a class=\"open-AddBookDialog btn btn-danger\" onclick=\"deleteInformation({$row_info["info_id"]})\">"
                                .'Delete'.'</a></td></tr>';
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
                    <h3 class="text-center" style="color: #ffffff;">Information Details</h3>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <h5  id="infoId" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="plant_type" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="plant_name" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="disease_name" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="disType" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="infodate" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="symtoms" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="details_symtoms" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  class="text-danger" id="details_solution" style="margin-top: 10px;margin-left: 10px;"></h5>
                    </div>

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-10"><img id="infoImage" alt="Feedback Image" class="img-responsive" style="width: 640px;height: 480px; " ></div>
                        <div class="col-md-1"></div>

                    </div>

                </div>
                <div class="modal-footer">
<!--                    <button type="button" class="btn btn-success" onclick="updateInformation()" >Update Details</button>-->
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
