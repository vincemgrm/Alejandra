<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navhome.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php

 $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id'=>$_GET['user']]);
    $user = $stmt->fetch();

    $id=$user['id'];
     $pid = sprintf("%05d",$_GET['payment']);

$now = date('Y-m-d');
$stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM payment WHERE transaction_no=:transaction_no and remarks=:remarks " );
      $stmt2->execute(['transaction_no'=>$_GET['transaction'],'remarks'=>'unpaid']);
      $value = $stmt2->fetch();
      $ctr = $value['numrows'];

     $stmt3 = $conn->prepare("SELECT * FROM payment WHERE user_id=:user_id AND transaction_no=:transaction_no AND payment_id=:payment_id");
  $stmt3->execute(['user_id'=>$user['id'],'transaction_no'=>$_GET['transaction'], 'payment_id'=>$_GET['payment']]);
  $pay = $stmt3->fetch();

  $stmt8 = $conn->prepare("SELECT * FROM receipt WHERE user_id=:user_id AND transaction_no=:transaction_no AND payment_id=:payment_id");
  $stmt8->execute(['user_id'=>$user['id'],'transaction_no'=>$_GET['transaction'], 'payment_id'=>$_GET['payment']]);
  $rec = $stmt8->fetch();
$datepaid=date('M d, Y', strtotime($rec['date_paid']));
  $atp1=$pay['amount_received']-$pay['amount_change'];

   

 $stmt1 = $conn->prepare("SELECT * FROM transaction WHERE user_id=:user_id AND transaction_no=:transaction_no");
  $stmt1->execute(['user_id'=>$user['id'],'transaction_no'=>$_GET['transaction']]);
  $trans = $stmt1->fetch();
  $bal=$trans['total_amount'];
  if($ctr<=0){
$atbp=0;

  }
  else{
$atbp=$trans['balance']/$ctr;
}
    $pdo->close();
  


	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='callout callout-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="hold-transition skin-blue sidebar-mini"  onload="window.print();" onafterprint="history.back();">


	        		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <?php echo"
              
<a href='payment.php?transaction=".$_GET['transaction']."&user=".$_GET['user']." ' class='btn btn-sm btn-primary btn-flat hidden-print'><i class='fa fa-arrow-left'></i> go back</a>

";?>
            </div>
            <div class="box col-sm-2">
            <div class="box-header with-border">

               <img src="images/IMG_20191102_000401.jpg" width="200px">
            


<?php
echo "<h5> Transaction No. ".$_GET['transaction']." <span class='pull-right'>
Date of Payment: ".$datepaid."</h5>
                        <hr>


           <h5> Payment ID  ".$pid."  <span class='pull-right'>
            Due Date: ".date('M d, Y', strtotime($rec['due_date']))."</h5><hr>
" ;

?>
            <div class="col-sm-4">
                       
                        
                      
                      <span class='pull-right'><h5> Total Price:<span class='pull-right'>Php <?php echo number_format($trans['total_amount'], 2);?></h5> <hr>
                      <span class='pull-right'><h5> Total Payment:<span class='pull-right'>Php <?php echo number_format($rec['amount_paid'], 2);?> </h5> <hr>
                      <span class='pull-right'><h5>Balance:<span class='pull-right'>Php <?php echo number_format($rec['balance'], 2);?></h5> <hr>
                      <span class='pull-right'> <h5>Cash:<span class='pull-right'>Php <?php echo number_format($rec['amount_received'], 2);?></h5> <hr>
                      <span class='pull-right'><h5>Amount to pay:<span class='pull-right'>Php <?php echo number_format($rec['amt_to_pay'], 2);?></h5> <hr>
                      <span class='pull-right 50%'><h5> Change:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='pull-right'>Php <?php echo number_format($rec['amount_change'], 2);?></span> </h5> <hr>
                    </div>
                    
                     
               
</div>
</div>
	        			</div>
	        		</div>
	        	</div>
	        	
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	
  	<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$(document).on('click', '.transact', function(e){
		e.preventDefault();
		$('#transaction').modal('show');
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'transaction.php',
			data: {id:id},
			dataType: 'json',
			success:function(response){
				$('#transaction_date').html(response.date);
				$('#transaction_no').html(response.transaction);
				//$('#detail').prepend(response.list);
				$('#total').html(response.total);
			}
		});
	});

	$("#transaction").on("hidden.bs.modal", function () {
	    $('.prepend_items').remove();
	});
});
</script>
</body>
</html>