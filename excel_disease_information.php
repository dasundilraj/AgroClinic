<table border="1">
    <tr>
        <th>INFORMATION ID</th>
        <th>PLANT TYPE</th>
        <th>PLANT NAME</th>
        <th>DISEASE NAME</th>
        <th>DISEASE TYPE</th>
        <th>UPLOADED DATE</th>
        <th>SYMPTOMS</th>
        <th>SYMPTOMS DETAILS</th>
        <th>SOLUTION</th>
        <th>INFORMATION IMAGE</th>
    </tr>
    <?php
    //info_id, plant_type, plant_name, disease_name, disease_type, date, symtoms, details_symtoms, solution, image, user_login_id, tags
    include_once "connection.php";

    //query get data

    $sql="SELECT * FROM information ORDER BY date DESC " ;
    $result=mysqli_query($conn,$sql);

    $no = 1;

    while($data = mysqli_fetch_assoc($result)){
        echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['plant_type'].'</td>
			<td>'.$data['plant_name'].'</td>
			<td>'.$data['disease_name'].'</td>
			<td>'.$data['disease_type'].'</td>
			<td>'.$data['date'].'</td>
			<td>'.$data['symtoms'].'</td>
			<td>'.$data['details_symtoms'].'</td>
			<td>'.$data['solution'].'</td>
			<td>'.$data['image'].'</td>
		</tr>
		';
        $no++;
    }
    ?>
</table>