<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		include('../db.php');
	    $name =  $_POST['name'];
	    $dob =  $_POST['dob'];
	    // $sex =  $_POST['sex'];
	    $email =  $_POST['email'];
	    $contact =  $_POST['contact'];
	    $address =  $_POST['address'];
	    $dept =  $_POST['dept'];
	    $section =  $_POST['section'];
	    $dept_name =  $_POST['dept_name'];
	    $dept_code =  $_POST['dept_code'];
	    $sec_name =  $_POST['sec_name'];
	    $sec_code =  $_POST['sec_code'];
	    $sql = "INSERT INTO `students` (`name`, `date`,`email`, `contact`, `address`, `dept_id`, `section_id`) VALUES ('$name', '$dob','$email', '$contact', '$address', '$dept', '$section')";
	    $stmt = $con->prepare($sql);
		 // execute the query
		$stmt->execute();
	   echo $stmt->rowCount() . " records UPDATED successfully";

	  
	   	 $sql1 = "INSERT INTO `departments` (`name`, `code`) VALUES ('$dept_name', '$dept_code')";
	     $stmt1 = $con->prepare($sql1);
		 // execute the query
		 $stmt1->execute();
	     echo $stmt1->rowCount() . " records UPDATED successfully";
	   

	    $sql2 = "INSERT INTO `sections` (`name`, `code`) VALUES ('$sec_name', '$sec_code')";
	     $stmt2 = $con->prepare($sql2);
		 // execute the query
		 $stmt2->execute();
	     echo $stmt2->rowCount() . " records UPDATED successfully";

	   
}
?>