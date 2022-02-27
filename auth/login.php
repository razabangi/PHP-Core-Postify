<?php 
include('../admin/includes/db.php');
session_start();

if (isset($_POST['login'])) {
	$get_username = $_POST['username'];
	$get_password = $_POST['password'];

	$get_username = mysqli_real_escape_string($connection,$get_username);
	$get_password = mysqli_real_escape_string($connection,$get_password);

	$query = "SELECT * FROM users WHERE username = '$get_username' ";
	$query = mysqli_query($connection, $query);
	
	while($row = mysqli_fetch_assoc($query)){
		$user_id = $row['user_id'];
		$username = $row['username'];
		$user_first_name = $row['user_first_name'];
		$user_lastname = $row['user_lastname'];
		$user_email = $row['user_email'];
		$user_password = $row['user_password'];
		$role = $row['role'];
	}

	// $get_password = crypt($get_password,$user_password);

	if ($get_username === $username && $get_password === $user_password) {
		
		$_SESSION['user_id'] = $user_id;
		$_SESSION['username'] = $username;
		$_SESSION['user_first_name'] = $user_first_name;
		$_SESSION['user_lastname'] = $user_lastname;
		$_SESSION['user_email'] = $user_email;
		$_SESSION['role'] = $role;
		$_SESSION['isLoggedIn'] = true;

		header('Location: ../admin');
	}
	else
	{
		header('Location: ../index.php');
	}
	

}


?>