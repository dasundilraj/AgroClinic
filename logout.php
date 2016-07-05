<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: index.php");
}
else if(isset($_SESSION['user'])!="")
{
    header("Location: infoupload.php");
}

if(isset($_GET['logout']))
{
    session_destroy();          //destroy session
    unset($_SESSION['user']);
    header("Location: index.php");
}
?>