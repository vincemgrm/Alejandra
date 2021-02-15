<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$id = $_POST['id'];
		$product = $_POST['product'];
		$quantity = $_POST['quantity'];

		$conn = $pdo->open();
 $stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM transaction");
                      $stmt2->execute();
                      $value = $stmt2->fetch();
                      $ctr = $value['numrows'];
                      if($ctr>0){
                        $ctr = $ctr + 1;
                      }else{
                        $ctr = 1;
                      }
                      $ctr = sprintf("%05d",$ctr);
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE product_id=:id and user_id=:user_id");
		$stmt->execute(['id'=>$product, 'user_id'=>$id]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Product exist in cart';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id,  quantity, transaction_no) VALUES (:user_id, :product,  :quantity, :transaction_no)");
				$stmt->execute(['user_id'=>$id, 'product'=>$product,  'quantity'=>$quantity, 'transaction_no'=>$ctr]);

				$_SESSION['success'] = 'Product added to cart';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();

		header('location: cart2.php?user='.$id);
	}

?>