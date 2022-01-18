<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test'); //Here you need to use the path for your DB
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, email, password, number) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully";
		$stmt->close();
		$conn->close();
	}
?>