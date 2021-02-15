<?php
	include 'includes/session.php';
	$id=$_GET['id'];
	// $featured=$_GET['featured'];

 $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
                        $stmt->execute(['id'=>$id]);
                        $row=  $stmt->fetch();

                        $stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE featured=:featured " );
    					$stmt2->execute(['featured'=>"yes"]);
    					$value = $stmt2->fetch();
    					$ctr = $value['numrows'];

                        $pdo->close();

	if($row['featured']=="yes"){

		try{
			$stmt = $conn->prepare("UPDATE products SET featured=:featured WHERE id=:id");
			$stmt->execute(['featured'=>"no" , 'id'=>$id]);
			$_SESSION['success'] = 'Removed from featured products';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{

		if($ctr<9){
		try{
			$stmt = $conn->prepare("UPDATE products SET featured=:featured WHERE id=:id");
			$stmt->execute(['featured'=>"yes" , 'id'=>$id]);
			$_SESSION['success'] = 'Added to featured products';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
					}
		else{
			$_SESSION['error'] = 'Cannot add any more featured products';
		}
		
		
		$pdo->close();
	}

	header('location: products.php');

?>