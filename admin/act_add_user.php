<?php 
include('includes/db.php');
if (isset($_POST['submit'])) {
	// global $connection;
	$user_first_name = $_POST['user_first_name'];
	$user_lastname = $_POST['user_lastname'];
	$username = $_POST['username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$role = $_POST['role'];
	$user_date = date("l jS \of F Y h:i:s A");

	$query = "INSERT into users (user_first_name,user_lastname,username,user_email,user_password,role,user_date) VALUES ('$user_first_name','$user_lastname','$username','$user_email','$user_password','$role','$user_date')";
	$result = mysqli_query($connection,$query);

	if ($result){
		header('Location:users.php');
	}
	else
	{
		die('error:'.mysqli_error($connection));
	}

}


?>