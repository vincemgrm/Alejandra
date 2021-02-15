<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM transaction LEFT JOIN users ON transaction.user_id=users.id WHERE transaction.user_id=:id" );
    	$stmt2->execute(['id'=>$id]);
    	$value = $stmt2->fetch();
    	$ctr = $value['numrows'];

    	if($ctr>0){

    		$_SESSION['error'] = 'You cannot delete this account. It still has pending transaction';
    	}
    	else{

		try{
			$stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'User deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
}
	else{
		$_SESSION['error'] = 'Select user to delete first';
	}

	header('location: users.php');
	
?>