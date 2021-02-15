<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
	
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM comments WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Comment deleted';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();

		header('location: commentadmin.php');
	}

?>