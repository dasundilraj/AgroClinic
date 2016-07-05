<table border="1">
    <tr>
        <th>User ID</th>
        <th>USER EMAIL</th>
        <th>USER PASSWORD</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>DESIGNATION</th>
        <th>CONTACT NO</th>
        <th>USER IMAGE</th>
    </tr>
    <?php

    include_once "connection.php";

    //query get data

    $sql="SELECT *  FROM user INNER JOIN user_login WHERE user.user_login_id= user_login.id ORDER BY id DESC ";
    $result=mysqli_query($conn,$sql);

    $no = 1;

    while($data = mysqli_fetch_assoc($result)){
        echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['user_name'].'</td>
			<td>'.$data['password'].'</td>
			<td>'.$data['first_name'].'</td>
			<td>'.$data['last_name'].'</td>
			<td>'.$data['designation'].'</td>
			<td>'.$data['contact_no'].'</td>
			<td>'.$data['userimage'].'</td>
		</tr>
		';
        $no++;
    }
    ?>
</table>