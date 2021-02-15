<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM aboutus WHERE id=1");
		$stmt->execute();
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>