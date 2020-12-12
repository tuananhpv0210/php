<?php 
include("../connect.php");
if(isset($_GET['id'])){
	$id = $_GET['id'];
	try {
	  	$query = "DELETE FROM users WHERE id = '$id'";
		mysqli_query($conn,$query);
		header('location: listUser.php');
	}
	catch(Exception $e) {
  		echo 'lõi rồi ';
	}

}
?>