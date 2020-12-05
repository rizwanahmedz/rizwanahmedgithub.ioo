<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into coronavirus(firstname, lastname, gender, email,number) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $firstname, $lastname, $gender, $email, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration Successfully Completed Thank You...";
		$stmt->close();
		$conn->close();
	}
?>