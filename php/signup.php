<?php
	$username = $_GET['Username'];
	$password = $_GET['Password'];
	$email = $_GET['Email'];

	$con=mysqli_connect("localhost","root","","fancy hotels");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	//Check for unique username
	$sql = "SELECT * 
	        FROM customer
	        WHERE Username='$username'";

	$result = mysqli_query($con,$sql);

	if (mysqli_num_rows($result)>0) {
		//If the username is found, then show error message
		echo "Error. Duplicate.";		
	} else {
		//If the username is not found, then enter user information into table and show confirmation message
		$sql="INSERT INTO customer(Username, PASSWORD, Email)
      	VALUES('$username', '$password', '$email')";

      	if (!mysqli_query($con,$sql)){ die('Error: ' . mysqli_error($con)); }
		echo "Account created!";
	}

	mysqli_close($con);

?>

