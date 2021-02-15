<?php
	include 'includes/session.php';

	if(isset($_POST['add_penalty'])){
		$tn = $_POST['tn'];
		
		
		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM transaction WHERE transaction_no=:transaction_no");
		$stmt->execute(['transaction_no'=>$tn]);
		$row = $stmt->fetch();
		$pen=$row['penalty'];
		$penalty=$row['total_amount']*.02;
		$pen+=$penalty;
		$nta=$row['total_amount']+$penalty;
		$bal=$row['balance']+$penalty;
		$user=$row['user_id'];

		



		
		try{
			$stmt = $conn->prepare("UPDATE transaction SET balance=:balance, total_amount=:total_amount, penalty=:penalty WHERE transaction_no=:transaction_no");

			$stmt->execute(['balance'=>$bal,'total_amount'=>$nta, 'penalty'=>$pen, 'transaction_no'=>$tn]);
			$_SESSION['success'] = 'Penalty added successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'penalty not added';
	}

	header('location: payment.php?transaction='.$tn.'&user='.$user.'');

?>