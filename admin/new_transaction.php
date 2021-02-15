

<?php
	include 'includes/session.php';

	if(isset($_POST['new_transaction'])){

		$id = $_POST['id']; 

        $stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM transaction LEFT JOIN users ON transaction.user_id=users.id WHERE transaction.user_id=:id AND transaction.balance>0" );
        $stmt2->execute(['id'=>$id ]);
        $value = $stmt2->fetch();
        $ctr = $value['numrows'];



         $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id'=>$_GET['user']]);
    $user = $stmt->fetch();             

        if($ctr>0){
             $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
             $stmt->execute(['id'=>$_GET['user']]);
                $user = $stmt->fetch();  

            $_SESSION['error'] = "You cannot add new transaction . This account has a pending transaction";
            header('location: users.php');
        }
        else{        
             
       try{
         $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id'=>$_GET['user']]);
    $user = $stmt->fetch();             
    $stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM transaction " );
    $stmt2->execute();
    $value = $stmt2->fetch();
    $ctr = $value['numrows'];
    if ($value>0){
        $ctr = $ctr + 1;
    }else{
        $ctr = 1;
    }
    // $ctr=sprintf("%05d",$ctr);
    // $now = date('Y-m-d');
    // $stmt2 = $conn->prepare("INSERT INTO transaction (transaction_no, transaction_date, user_id) VALUES (:transaction_no, :transaction_date, :user_id) ");
    //     $stmt2->execute(['transaction_no'=>$ctr, 'transaction_date'=>$now,'user_id'=>$id]);

// $stmt2 = $conn->prepare("INSERT INTO cart (transaction_no) VALUES (:transaction_no) ");
//         $stmt2->execute(['transaction_no'=>$ctr]);
//         $_SESSION['success'] = 'transaction started';

      }
      catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
			}
		header('location: cart.php?user=' . $id); }
    }
		$pdo->close();
	
	
	

?>