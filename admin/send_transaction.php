<!--send transaction-->
<?php
	include 'includes/session.php';
	if(isset($_POST['send_transaction'])){
		$id = $_POST['userid'];
		
    $cash=$_POST['cash'];
		 $conn = $pdo->open();
       try{

     	$stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM transaction " );
    	$stmt2->execute();
    	$value = $stmt2->fetch();
    	$ctr = $value['numrows'];
    	if ($value>0){
        $ctr = $ctr + 1;
   		 }else{
        $ctr = 1;
    	         }
     $ctr = sprintf("%05d",$ctr);
     $stmt = $conn->prepare("SELECT user_id FROM cart WHERE transaction_no=:transaction_no");
    $stmt->execute(['transaction_no'=>$ctr]);
    $cart = $stmt->fetch();

    
$stmt4 = $conn->prepare("SELECT *, cart.id AS cartid, SUM(cart.quantity * products.price) AS sum FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE transaction_no=:transaction_no
   group by cart.transaction_no  ");
    $stmt4->execute(['transaction_no'=>$ctr]);
    $val=$stmt4->fetch();
    $balance=$val['sum']-$cash;
    $atbp=$balance/6;


    $now = date('Y-m-d');
 
    $stmt2 = $conn->prepare("INSERT INTO transaction (transaction_no, transaction_date, total_amount, initial_dp, balance, amountpaid, user_id) VALUES (:transaction_no, :transaction_date, :total_amount, :initial_dp, :balance, :amountpaid,  :user_id) ");
        $stmt2->execute(['transaction_no'=>$ctr, 'transaction_date'=>$now, 'total_amount'=>$val['sum'], 'initial_dp'=>$cash, 'balance'=>$balance, 'amountpaid'=>$cash, 'user_id'=>$cart['user_id']]);


        $_SESSION['success'] = 'transaction added';

          for ($x = 1; $x <= 6; $x++) {
      $d=14;
      $a=$x*$d;
         $sam = date('Y-m-d');
$duedate= date('Y-m-d',strtotime($sam.'+ '.$a.' days'));
 $stmt2 = $conn->prepare("INSERT INTO payment (user_id, transaction_no,due_date,remarks, amount_due) VALUES (:user_id, :transaction_no,:due_date, :remarks, :amount_due) ");
        $stmt2->execute([ 'user_id'=>$cart['user_id'],'transaction_no'=>$ctr, 'due_date'=>$duedate,'remarks'=>"unpaid", 'amount_due'=>$atbp]);



                                        }

      }
      catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
			}
       header('location: firstrec.php?transaction='.$ctr.'&user='.$id.'');
		}

// pay bigger amount



      if(isset($_POST['pba'])){
    $id = $_POST['userid'];
    $ba=$_POST['bigger_amount'];
    $total_amount=$_POST['amount'];
        $downpayment=$_POST['downpayment'];
        $cash=$_POST['cash'];
     $conn = $pdo->open();
     if($ba<$cash){

     

      $_SESSION['error'] = 'payment unsuccesful';

      header('location: cart2.php?user='.$id.'');

     }
     else{
       try{
     
     

      $stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM transaction " );
      $stmt2->execute();
      $value = $stmt2->fetch();
      $ctr = $value['numrows'];
      if ($value>0){
        $ctr = $ctr + 1;
       }else{
        $ctr = 1;
               }
     $ctr = sprintf("%05d",$ctr);
     $stmt = $conn->prepare("SELECT user_id FROM cart WHERE transaction_no=:transaction_no");
    $stmt->execute(['transaction_no'=>$ctr]);
    $cart = $stmt->fetch();

  
$stmt4 = $conn->prepare("SELECT *, cart.id AS cartid, SUM(cart.quantity * products.price) AS sum FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE transaction_no=:transaction_no
   group by cart.transaction_no  ");
    $stmt4->execute(['transaction_no'=>$ctr]);
    $val=$stmt4->fetch();
    $balance=$val['sum']-$ba;
    $atbp=$balance/6;


    $now = date('Y-m-d');
 
    $stmt2 = $conn->prepare("INSERT INTO transaction (transaction_no, transaction_date, total_amount, initial_dp, balance, amountpaid, user_id) VALUES (:transaction_no, :transaction_date, :total_amount, :initial_dp, :balance, :amountpaid,  :user_id) ");
        $stmt2->execute(['transaction_no'=>$ctr, 'transaction_date'=>$now, 'total_amount'=>$val['sum'], 'initial_dp'=>$ba, 'balance'=>$balance, 'amountpaid'=>$ba, 'user_id'=>$cart['user_id']]);


        $_SESSION['success'] = 'transaction added';

          for ($x = 1; $x <= 6; $x++) {
      $d=14;
      $a=$x*$d;
         $sam = date('Y-m-d');
$duedate= date('Y-m-d',strtotime($sam.'+ '.$a.' days'));
$stmt2 = $conn->prepare("INSERT INTO payment (user_id, transaction_no,due_date,remarks, amount_due) VALUES (:user_id, :transaction_no,:due_date, :remarks, :amount_due) ");
        $stmt2->execute([ 'user_id'=>$cart['user_id'],'transaction_no'=>$ctr, 'due_date'=>$duedate,'remarks'=>"unpaid", 'amount_due'=>$atbp]);


                                        }

      }

      catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
      }
      header('location: firstrec.php?transaction='.$ctr.'&user='.$id.'');
    }

    }

		$pdo->close();
	
	


?>









