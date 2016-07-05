<?php
//create data base connection

$ServerName="localhost";
$Username="root";
$Password="";
$DBName="agro_clinic";

//create connection

$conn=mysqli_connect($ServerName,$Username,$Password,$DBName);

//check connection

if(!$conn){

    die("Connection Failed".mysqli_connect_error());
}

?>