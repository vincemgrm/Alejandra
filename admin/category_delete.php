<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM  products LEFT JOIN category  ON products.category_id=category.id WHERE products.category_id=:id" );
    	$stmt2->execute(['id'=>$id]);
    	$value = $stmt2->fetch();
    	$ctr = $value['numrows'];

    	if($ctr>0){

    		$_SESSION['error'] = 'You cannot delete this category';
    	}
    	else{

		try{
			$stmt = $conn->prepare("DELETE FROM category WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Category deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
			}
		}
	else{
		$_SESSION['error'] = 'Select category to delete first';
	}

	header('location: category.php');
	
?>