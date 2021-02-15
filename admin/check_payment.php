<?php
	include 'includes/session.php';

	if(isset($_POST['confirm'])){
		$id = $_POST['payment_id'];
		$transaction_no = $_POST['transaction_no'];
		$userid=$_POST['user_id'];
		
		
		$now = date('Y-m-d');
		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM payment WHERE payment_id=:payment_id");
		$stmt->execute(['payment_id'=>$id]);
		$row = $stmt->fetch();
		$bill=$row['amount_due'];

		$stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM payment WHERE transaction_no=:transaction_no and remarks=:remarks " );
    	$stmt2->execute(['transaction_no'=>$transaction_no,'remarks'=>'unpaid']);
    	$value = $stmt2->fetch();

    	$ctr = $value['numrows'];

    	$stmt3 = $conn->prepare("SELECT * FROM transaction WHERE transaction_no=:transaction_no");
		$stmt3->execute(['transaction_no'=>$transaction_no]);
		$val = $stmt3->fetch();

		$atp=number_format($val['balance']/$ctr,2);
		$newbal=$val['balance']-$bill;
		$newap=$val['amountpaid']+$bill;
	
		$nad=0;
		if($bill>=$row['amount_due']){


		try{
			$stmt = $conn->prepare("UPDATE payment SET remarks=:remarks, amount_due=:amount_due, amount_received=:amount_received, amount_change=:amount_change WHERE payment_id=:payment_id");

			$stmt->execute(['remarks'=>"paid", 'amount_due'=>$nad, 'amount_received'=>$bill, 'amount_change'=>$change,'payment_id'=>$id]);


			$stmt5 = $conn->prepare("UPDATE transaction SET balance=:balance, amountpaid=:amountpaid WHERE transaction_no=:transaction_no");

			$stmt5->execute(['balance'=>$newbal, 'amountpaid'=>$newap, 'transaction_no'=>$transaction_no]);

			$stmt7 = $conn->prepare("INSERT INTO receipt (date_paid, due_date,transaction_no,user_id,payment_id,balance, amount_paid, amount_received, amt_to_pay,amount_change) VALUES (:date_paid, :due_date,:transaction_no,:user_id,:payment_id,:balance, :amount_paid, :amount_received, :amt_to_pay,:amount_change) ");
        $stmt7->execute([ 'date_paid'=>$now, 'due_date'=>$row['due_date'], 'transaction_no'=>$transaction_no, 'user_id'=>$userid, 'payment_id'=>$id,        'balance'=>$newbal, 'amount_paid'=>$newap, 'amount_received'=>$bill, 'amt_to_pay'=>$bill, 'amount_change'=>0]);




			

		}
		
		


		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
		header('location: invoicesample.php?transaction='.$transaction_no.'&user='.$userid.'&payment='.$id.'');
	}
	else{
	$_SESSION['error'] = 'Payment Unsuccessful';
	$_SESSION['error'] = 'Your bill must be higher than Php '.number_format($atp, 2).'!!!';
	$_SESSION['error'] = 'Payment Unsuccessful';
		header('location: payment.php?transaction='.$transaction_no.'&user='.$userid.'');
}
}





if(isset($_POST['pay_ba'])){
		$id = $_POST['payment_id'];
		$idnext=$id+1;
		$transaction_no = $_POST['transaction_no'];
		$userid=$_POST['user_id'];
		$bill=$_POST['bigger_amount'];
		$amount_due=$_POST['bill'];
		
		$now = date('Y-m-d');
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

		$atp=$val['balance']/$ctr;
		$newbal=$val['balance']-$bill;
		$newap=$val['amountpaid']+$bill;
		$change=$bill-$row['amount_due'];
		$new=$row['amount_due']-$change;
		if($bill>$row['amount_due']){


		try{
			$stmt = $conn->prepare("UPDATE payment SET remarks=:remarks, amount_due=:amount_due, amount_received=:amount_received, amount_change=:amount_change, bigger_amount=:bigger_amount WHERE payment_id=:payment_id");

			$stmt->execute(['remarks'=>"paid",'amount_due'=>0, 'amount_received'=>$bill, 'amount_change'=>0, 'bigger_amount'=>$bill, 'payment_id'=>$id]);


			$stmt5 = $conn->prepare("UPDATE transaction SET balance=:balance, amountpaid=:amountpaid WHERE transaction_no=:transaction_no");

			$stmt5->execute(['balance'=>$newbal, 'amountpaid'=>$newap, 'transaction_no'=>$transaction_no]);

			$stmt7 = $conn->prepare("INSERT INTO receipt (date_paid, due_date,transaction_no,user_id,payment_id,balance, amount_paid, amount_received, amt_to_pay) VALUES (:date_paid, :due_date,:transaction_no,:user_id,:payment_id,:balance, :amount_paid, :amount_received, :amt_to_pay) ");
        $stmt7->execute([ 'date_paid'=>$now, 'due_date'=>$row['due_date'], 'transaction_no'=>$transaction_no, 'user_id'=>$userid, 'payment_id'=>$id,        'balance'=>$newbal, 'amount_paid'=>$newap, 'amount_received'=>$bill, 'amt_to_pay'=>$row['amount_due']]);


       $stmt = $conn->prepare("UPDATE payment SET  amount_due=:amount_due, amount_received=:amount_received, amount_change=:amount_change, bigger_amount=:bigger_amount WHERE payment_id=:payment_id");

			$stmt->execute(['amount_due'=>$new, 'amount_received'=>$bill, 'amount_change'=>0, 'bigger_amount'=>$bill, 'payment_id'=>$idnext]);


			



			

		}
		
		


		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
		header('location: invoicesample.php?transaction='.$transaction_no.'&user='.$userid.'&payment='.$id.'');
	}
	else{

	$_SESSION['error'] = 'Your bill must be higher than Php '.number_format($atp, 2).'!!!';
	$_SESSION['error'] = 'Payment Unsuccessful';
		header('location: payment.php?transaction='.$transaction_no.'&user='.$userid.'');
}
}

	else{

		
	}

	

?>