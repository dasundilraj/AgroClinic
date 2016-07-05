<?php

$info_id=$_GET['id'];

include_once "connection.php";

$sql="DELETE FROM information WHERE info_id=$info_id  ";
//info_id, plant_type, plant_name, disease_name, disease_type, date, symtoms, details_symtoms, solution, image, user_login_id, tags

$result=mysqli_query($conn,$sql);

?>