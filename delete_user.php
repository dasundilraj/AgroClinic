<?php

$user_id=$_GET['id'];

include_once"connection.php";

$sql_1="DELETE FROM user WHERE user_login_id=$user_id  ";
$sql_2="DELETE FROM user_login WHERE id=$user_id";

$result_1=mysqli_query($conn,$sql_1);
$result_2=mysqli_query($conn,$sql_2);


?>