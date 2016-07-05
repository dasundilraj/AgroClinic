<?php

include_once("connection.php");

session_start();                                //start session

if(isset($_POST["login_email"])&&isset($_POST["login_password"])){

    $user_name=$_POST["login_email"];
    $pwd=$_POST["login_password"];


    if((strtolower($user_name)=="admin1234@gmail.com")&&($pwd=="admin1234")){                    //main admin default user name and password

        $_SESSION['user'] = 0;
        $_SESSION['user_main_admin_pwd']="admin1234";
        $_SESSION['user_name'] = "Main Admin";
        header('Location:main_admin_dashboard.php ');

    }
    else{
        $sql="SELECT * FROM user_login WHERE user_name='$user_name' && password='$pwd'";//select query for login

        $result=mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        if(mysqli_num_rows($result)!=0) {

            $_SESSION['user'] = $row['id'];           //assign user id as session variable
            $_SESSION['user_pwd'] = $row['password'];
            $_SESSION['normal_user_uname']=$row['user_name'];
            header('Location:infoupload.php');
        }
        else{

            header('Location: index.php?login=false');
        }
    }
}

?>