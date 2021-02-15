<?php
	include 'includes/session.php';

	if(isset($_POST['editcontact'])){
		$id = $_POST['id'];
		
		$email = $_POST['email'];
		$contactno=$_POST['contactno'];
		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM contactus WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		
		try{
			$stmt = $conn->prepare("UPDATE contactus SET email=:email, contactno=:contactno WHERE id=:id");

			$stmt->execute(['email'=>$email, 'contactno'=>$contactno, 'id'=>$id]);
			$_SESSION['success'] = 'User updated successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit user form first';
	}

	header('location: users.php');

?>