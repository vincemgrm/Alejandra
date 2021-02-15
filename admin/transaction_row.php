<?php 
	include 'includes/session.php';

	if(isset($_POST['transaction_no'])){
		$id = $_POST['transaction_no'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM transaction WHERE transaction_no=:transaction_no");
		$stmt->execute(['transaction_no'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>