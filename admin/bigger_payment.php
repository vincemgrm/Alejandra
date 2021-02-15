<?php
	include 'includes/session.php';

	if(isset($_POST['confirm'])){
		$id = $_POST['payment_id'];
		$transaction_no = $_POST['transaction_no'];
		$userid=$_POST['user_id'];
		$amount=$_POST['amount'];
		
		
		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM payment WHERE payment_id=:payment_id");
		$stmt->execute(['payment_id'=>$id]);
		$row = $stmt->fetch();

		$stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM payment WHERE transaction_no=:transaction_no and remarks=:remarks " );
    	$stmt2->execute(['transaction_no'=>$transaction_no,'remarks'=>'unpaid']);
    	$value = $stmt2->fetch();
    	$ctr = $value['numrows'];

    	$stmt3 = $conn->prepare("SELECT * FROM transaction WHERE transaction_no=:transaction_no");
		$stmt3->execute(['transaction_no'=>$transaction_no]);
		$val = $stmt3->fetch();
		$user_id=$val['user_id'];

		$atp=$val['balance']/$ctr;
		$newbal=$val['balance']-$amount;
		$newap=$val['amountpaid']+$amount;


		try{
			if($amount>=$atp){
			$stmt = $conn->prepare("UPDATE payment SET remarks=:remarks WHERE payment_id=:payment_id");

			$stmt->execute(['remarks'=>"paid",'payment_id'=>$id]);


			$stmt5 = $conn->prepare("UPDATE transaction SET balance=:balance, amountpaid=:amountpaid WHERE transaction_no=:transaction_no");

			$stmt5->execute(['balance'=>$newbal, 'amountpaid'=>$newap,'transaction_no'=>$transaction_no]);




			$_SESSION['success'] = 'Payment Confirmed';
		}
		else{

			$_SESSION['error'] = 'Payment Unsuccessful';
			$_SESSION['error'] = 'The amount you entered is lower than its due';
		}

		}
		
		


		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Payment Unsuccessful';
	}

	header('location: payment.php?transaction='.$transaction_no.'&user='.$user_id.'');

?>