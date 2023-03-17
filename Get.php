<?php
require('dbcon.php');
	
	$name=$_POST['name'];
	
	$sql = "Select * from exam_details where Name='".$name."'";
	
	$result=$mysqli->query($sql);
	while($row = $result->fetch_assoc()){


     $json[] = $row;


  }


  $data['data'] = $json;


$result =  mysqli_query($mysqli,$sqlTotal);


$data['total'] = mysqli_num_rows($result);


echo json_encode($data);
	// if (mysqli_query($conn, $sql)) {
		// echo json_encode(array("statusCode"=>200));
	// } 
	// else {
		// echo json_encode(array("statusCode"=>201));
	// }
	// mysqli_close($conn);
?>