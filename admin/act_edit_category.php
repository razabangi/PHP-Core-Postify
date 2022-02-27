<?php 
include('includes/db.php');

if (isset($_POST['submit'])) {
	$cat_id = $_POST['cat_id'];
$cat_title = $_POST['cat_title'];

$query = "UPDATE category SET cat_title='$cat_title' WHERE cat_id='$cat_id'";
$result = mysqli_query($connection,$query);

if ($result) {
	header('Location:categories.php');
}
}




?>