<table border="1">
    <tr>
        <th>INFORMATION ID</th>
        <th>SENDER NAME</th>
        <th>SENDER EMAIL</th>
        <th>FEEDBACK MESSAGE</th>
        <th>FEEDBACK IMAGE</th>
        <th>UPLOADED DATE</th>
    </tr>
    <?php

    include_once "connection.php";

    //query get data

    $sql="SELECT * FROM feedback ORDER BY feedback_id DESC " ;
    $result=mysqli_query($conn,$sql);

    $no = 1;

    while($data = mysqli_fetch_assoc($result)){
        echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['sender_name'].'</td>
			<td>'.$data['sender_email'].'</td>
			<td>'.$data['message'].'</td>
			<td>'.$data['feedback_image_path'].'</td>
			<td>'.$data['submission_date'].'</td>
		</tr>
		';
        $no++;
    }
    ?>
</table>