<?php 
	include('../db.php');
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		
	    $status =  $_POST['data'];
	    $sql = "UPDATE `students` SET `status`='0' WHERE id = '$status'";
	    echo $sql;
	    $stmt = $con->prepare($sql);

		 // execute the query
		$stmt->execute();

	echo $stmt->rowCount() . " records UPDATED successfully";
		

}


?>