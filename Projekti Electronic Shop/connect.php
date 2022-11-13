<?php
	$fullName = $_POST['firstName'];
	$userName = $_POST['lastName'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$phone = $_POST['phone'];

	// Database connection
	$conn = new mysqli('localhost','root','','databaza_gaming');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into tabela_gaming(fullName, userName, email, gender, password, password2, phone) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssi", $fullName, $userName, $email, $gender, $password, $password2, $phone);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>