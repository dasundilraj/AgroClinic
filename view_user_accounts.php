<?php

session_start();
include_once "connection.php";

//check session states

if(!isset($_SESSION['user'])){          //session not remain(Destroyed)
    header("Location: index.php");      //redirect to index page
}

else {

    $userid = $_SESSION['user'];
    $username= $_SESSION['user_name'];



    $sql_1="SELECT *  FROM user INNER JOIN user_login WHERE user.user_login_id= user_login.id ORDER BY id DESC "; //retrieved data from user table

    $result_user_details=mysqli_query($conn,$sql_1);

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

            var user_fname  = $(this).data('fname');
            var user_lname=$(this).data('lname');
            var user_email=$(this).data('email');
            var user_password=$(this).data('password');
            var user_designation=$(this).data('designation');
            var user_contact=$(this).data('contact');
            var user_image=$(this).data('image');


            document.getElementById('fname').innerHTML="First Name : "+user_fname;
            document.getElementById('lname').innerHTML="Last Name : "+user_lname;
            document.getElementById('email').innerHTML="Email : "+user_email;
            document.getElementById('pwd').innerHTML="Password : "+user_password;
            document.getElementById('designation').innerHTML="Designation : "+user_designation;
            document.getElementById('contact').innerHTML="Contact Number : "+user_contact;
            document.getElementById('userImage').src=user_image;

        });

        function deleteuser(user_id){
            //window.prompt("Are You Sure want Delete User....? ")
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
                xmlhttp.open("GET","delete_user.php?id="+user_id,true);
                xmlhttp.send();

            }
            else{

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
        <li ><a href="main_admin_feed_details.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> View Feedback Information</a></li>
        <li><a href="main_admin_report_generate.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg> Report Generate</a></li>
        <li><a href="main_admin_lock_screen.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>Lock Screen</a></li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<!--    <div id="notify_delete"></div>-->

    <div class="row left_margin" style="">
        <div class="col-lg-12">
            <h1 class="page-header">User Accounts</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">User Table</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="fname" data-sortable="true">First Name</th>
                            <th data-field="lname"  data-sortable="true">Last Name</th>
                            <th data-field="email" data-sortable="true">Email</th>
                            <th data-field="password" data-sortable="true">Password</th>
                            <th data-field="designation" data-sortable="true">Designation</th>
                            <th data-field="contact" data-sortable="true">Contact No </th>
                            <th data-field="state" data-sortable="true"></th>
                            <th data-field="delete" data-sortable="true"></th>

                        </tr>
                        </thead>

                        <tbody>

                        <?php



                        while(  $result_user=mysqli_fetch_array($result_user_details,MYSQLI_ASSOC)){

//                            user_id, first_name, last_name, designation, contact_no, userimage, user_login_id
                           // id, user_name, password

                            echo '<tr> <td>'. $result_user['first_name'].'</td><td>'
                                .$result_user['last_name'].'</td><td>'
                                .$result_user['user_name'].'</td><td>'
                                .$result_user['password'].'</td><td>'
                                .$result_user['designation']
                                .'</td><td>'.$result_user['contact_no']
                                ."</td><td><a data-toggle=\"modal\" data-fname=\"{$result_user["first_name"]}\"
                                                                                data-lname=\"{$result_user["last_name"]}\"
                                                                                data-email=\"{$result_user["user_name"]}\"
                                                                                data-password=\"{$result_user["password"]}\"
                                                                                data-designation=\"{$result_user["designation"]}\"
                                                                                data-contact=\"{$result_user["contact_no"]}\"
                                                                                data-image=\"{$result_user["userimage"]}\"


                                            .title=\"Add this item\" class=\"open-AddBookDialog btn btn-primary\" href=\"#addBookDialog\">".'view'.'</a></td>'

                                ."</td><td><a class=\"open-AddBookDialog btn btn-danger\" onclick=\"deleteuser({$result_user["id"]})\">"
                                .'Delete'.'</a></td></tr>';
                        }
                        ?>

<!--                        echo '<tr> <td>'. $result_user['first_name'].'</td><td>'-->
<!--                                .$result_user['last_name'].'</td><td>'-->
<!--                                .$result_user['user_name'].'</td><td>'-->
<!--                                .$result_user['password'].'</td><td>'-->
<!--                                .$result_user['designation']-->
<!--                                .'</td><td>'.$result_user['contact_no']-->
<!--                                ."</td><td><a data-toggle=\"modal\" data-fname=\"{$result_user["first_name"]}\"-->
<!--                                              data-lname=\"{$result_user["last_name"]}\"-->
<!--                                              data-email=\"{$result_user["user_name"]}\"-->
<!--                                              data-password=\"{$result_user["password"]}\"-->
<!--                                              data-designation=\"{$result_user["designation"]}\"-->
<!--                                              data-contact=\"{$result_user["contact_no"]}\"-->
<!--                                              data-image=\"{$result_user["userimage"]}\"-->
<!--                                              data-id=\"{$result_user["id"]}\"-->
<!---->
<!---->
<!--                                              .title=\"Add this item\" class=\"open-AddBookDialog btn btn-primary\" href=\"#addBookDialog\">"-->
<!--                                .'view'.'</a></td></tr>';-->

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
                    <h3 class="text-center" style="color: #ffffff;">User Details</h3>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <h5  id="fname" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="lname" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="email" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="pwd" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="designation" style="margin-top: 10px;margin-left: 10px;"></h5>
                        <h5  id="contact" style="margin-top: 10px;margin-left: 10px;"></h5>

                    </div>



                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-10"><img id="userImage" alt="No Uploaded User Image" class="img-responsive" style="width: 320px;height: 240px; " ></div>
                        <div class="col-md-1"></div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
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
