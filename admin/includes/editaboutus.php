<?php
	include 'includes/session.php';

	if(isset($_POST['editaboutus'])){
		$id = $_POST['id'];
		
		$vision = $_POST['vision'];
		$mission=$_POST['mission'];
		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM aboutus WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		
		try{
			$stmt = $conn->prepare("UPDATE aboutus SET vision=:vision, mission=:mission WHERE id=:id");

			$stmt->execute(['vision'=>$vision, 'mission'=>$mission, 'id'=>$id]);
			$_SESSION['success'] = 'About us updated successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit user form first';
	}

	header('location: contactusadmin.php');

?>