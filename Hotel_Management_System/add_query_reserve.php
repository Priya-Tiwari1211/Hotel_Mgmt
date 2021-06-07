<?php 
error_reporting(0);
	require_once 'admin/connect.php';
	if(ISSET($_POST['add_guest'])){
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contactno = $_POST['contactno'];
		$checkin = $_POST['date'];


		$conn->query("INSERT INTO guest (firstname, middlename, lastname, address, contactno) VALUES('$firstname', '$middlename', '$lastname', '$address', '$contactno')") ;
		$query = $conn->query("SELECT * FROM guest WHERE firstname = '$firstname' && lastname = '$lastname' && contactno = '$contactno'");
		$fetch = $query->fetch_array();
		
		$query2 = $conn->query("SELECT * FROM transaction WHERE checkin = '$checkin' && `room_id` = '$_REQUEST[room_id]' && status= 'Pending'");
		$row = $query2->num_rows;

				if($row > 0){
					echo "<div class = 'col-md-4'>
								<label style = 'color:#ff0000;'> Date Is Not Available</label><br />";
						
						"</div>";
				}else{	
						if($guest_id = $fetch['guest_id']){
							$room_id = $_REQUEST['room_id'];
							$conn->query("INSERT INTO `transaction`(guest_id, room_id, status, checkin) VALUES('$guest_id', '$room_id', 'Pending', '$checkin')");
							header("location:reservation.php");
						}else{
							echo "<script>alert('Error Javascript Exception!')</script>";
						}
				}	
				
	}	
?>