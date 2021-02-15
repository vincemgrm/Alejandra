
<?php
	include 'includes/session.php';

	if(isset($_POST['sendcomment'])){
		$comment = $_POST['comment'];

		$conn = $pdo->open();

		
				$stmt = $conn->prepare("INSERT INTO comments (comment) VALUES (:comment)");
				$stmt->execute(['comment'=>$comment ]);
				$_SESSION['success'] = 'Category added successfully';
			
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'comment not sent';
	}

	header('location: index.php');

?>