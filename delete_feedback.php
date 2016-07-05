<?php

$feed_id=$_GET['id'];

include_once "connection.php";

$sql="DELETE FROM feedback WHERE feedback_id=$feed_id  ";

$result=mysqli_query($conn,$sql);

//feedback_id, sender_name, sender_email, message, feedback_image_path, submission_date


?>