<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_account'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn->mysqli_query("UPDATE admin SET name = '$name', username = '$username', password = '$password' WHERE admin_id = '$_REQUEST[admin_id]'");
		header("location:account.php");
	}	