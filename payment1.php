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
	        		$stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM payment WHERE transaction_no=:transaction_no and remarks=:remarks " );
      $stmt2->execute(['transaction_no'=>$_GET['transaction'],'remarks'=>'unpaid']);
      $value = $stmt2->fetch();
      $ctr = $value['numrows'];

     

   

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
	        		<div class="box box-solid">
	        			<div class="box-body">
	        				<div class="col-sm-3">
	        					<img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" width="100%">
	        				</div>
	        				<div class="col-sm-9">
	        					<div class="row">
	        						<div class="col-sm-3">
	        							<h4>Name:</h4>
	        							<h4>Email:</h4>
	        							<h4>Contact Info:</h4>
	        							<h4>Company:</h4>
	        							<h4>Member Since:</h4>
	        						</div>
	        						<div class="col-sm-9">
	        							<h4><?php echo $user['firstname'].' '.$user['lastname']; ?>
	        								<!-- <span class="pull-right">
	        									<a href="#edit" class="btn btn-success btn-flat btn-sm" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
	        								</span> -->
	        							</h4>
	        							<h4><?php echo $user['email']; ?></h4>
	        							<h4><?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></h4>
	        							<h4><?php echo (!empty($user['company'])) ? $user['company'] : 'N/a'; ?></h4>
	        							<h4><?php echo date('M d, Y', strtotime($user['created_on'])); ?></h4>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        		<div class="box box-solid">
	        			<div class="box-header with-border">
	        				
	        				
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Payment History</b></h4>
	        				<span class="pull-right">
	        				<?php echo "<a href='profile.php?user=".$user['id']."' class='btn btn-sm btn-flat btn-info''><i class='fa fa-arrow-left'></i> Back</a>"?>
	        			</span>
                <h4></i><b>Transaction no. <?php echo $_GET['transaction'] ;?></b></h4>
	        			</div>
	        			<div class="box-body">
	        				<table class="table table-bordered" id="example1">
	        					<div class="col-sm-9">


	        					    <h5>Total Price: </h5>
                        <h5>Initial Payment: </h5>
                        <h5>Total Payment: </h5>
                        <h5>Balance:</h5>
                        <h5>Remarks: </h5>
                        <h5>Amount to Pay(Every 2 Weeks):</h5>
                        <h5> Penalty: </h5>
                      
                    </div>
                  <div class="col-sm-3">
                      <?php 
                      if($trans['balance']<=0){

                    echo "
                          
                        <h5> Php".number_format($trans['total_amount'], 2)."</h5>
                        <h5> Php".number_format($trans['initial_dp'], 2)."</h5>
                        <h5> Php ".number_format($trans['total_amount'], 2)."</h5>
                        <h5> Php ".number_format($trans['balance'], 2)."</h5>
                        <h5>PAID </h5>
                        <h5>Php ".number_format($atbp, 2)."</h5>
                        <h5> Php ".number_format($trans['penalty'], 2)."</h5>
                       ";



                      }
                      else{
                         echo "
                          
                        <h5> Php".number_format($trans['total_amount'], 2)."</h5>
                        <h5> Php".number_format($trans['initial_dp'], 2)."</h5>
                        <h5> Php ".number_format($trans['amountpaid'], 2)."</h5>
                        <h5> Php ".number_format($trans['balance'], 2)."</h5>
                        <h5>UNPAID</h5>
                        <h5>Php ".number_format($atbp, 2)."</h5>
                        <h5> Php ".number_format($trans['penalty'], 2)."</h5>
                        ";


                      }
                      ?>
                  </div>
                       
           </div>
            <div class="box-body">

          <br/>
          <br/>
          <br/>

              <table class="table table-bordered" id="example1">
                    <thead>
                      <th class="hidden"></th>
                      <th>Payment ID</th>
                      <th>Duedate</th>
                      <th>Cash</th>
                      <th>Change</th>
                      <th>Remarks</th>
                  
                    </thead>
                    <tbody>
                    <?php
                      $conn = $pdo->open();

                      try{
                        $stmt = $conn->prepare("SELECT * FROM payment WHERE transaction_no=:transaction_no ");
                        $stmt->execute(['transaction_no'=>$_GET['transaction']]);
                       


                       foreach ($stmt as $row) {
                        
                          /*$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
                          $stmt2->execute(['id'=>$row['id']]);*/

                          $pid = sprintf("%05d",$row['payment_id']);
                           if($trans['balance']>0){
                            $change="Php ".number_format(0,2);

                           $now=date('Y-m-d');
                           $due1=date('Y-m-d', strtotime($now.'+ 14 days'));
                            $due2=date('Y-m-d', strtotime($now.'+ 1 days'));
                          if($due1==$row['due_date']&&$row['remarks']=="unpaid"){

                            echo "
                            <tr style='color:yellow;'>
                            ";
                          }
                          elseif($due2==$row['due_date']&&$row['remarks']=="unpaid"){

                            echo "
                            <tr style='color:yellow;'>
                            ";
                          }
                          elseif($now>=$row['due_date']||$now==$row['due_date']&&$row['remarks']=="unpaid"){

                            echo "
                            <tr style='color:red;'>
                            ";
                          }
                          else{
                             echo "
                            <tr>
                            ";

                          }


                          echo "
                            
                              <td class='hidden'></td>
                               <td>".$pid."</td>
                              <td>".date('M d, Y', strtotime($row['due_date']))."</td>
                              <td>Php ".number_format($row['amount_received'],2)."</td>
                             

                              ";
                              if ($row['remarks']=="paid"){
                              	echo "
                               <td>Php ".number_format($row['amount_change'],2)."</td>
                              <td>".$row['remarks']."<a href='userinvoice.php?transaction=".$_GET['transaction']."&user=".$_GET['user']."&payment=".$row['payment_id']."' class='btn btn-link btn-sm btn-flat'><i class='fa fa-search'></i> View Receipt</a></td> ";
                          		}
                          		else{
                          		echo "
                               <td>Php ".$change."</td>
                                <td>".$row['remarks']."</td> ";

                          				}
                          							}
                          else{
                          	 echo "
                            <tr>
                              <td class='hidden'></td>
                              <td>".$pid."</td>
                              <td>".date('M d, Y', strtotime($row['due_date']))."</td>
                              <td>Php ".number_format($row['amount_received'],2)."</td>
                              <td>Php ".number_format($row['amount_change'],2)."</td>
                              <td>Paid<a href='invoice.php?transaction=".$_GET['transaction']."&user=".$_GET['user']."&payment=".$row['payment_id']."' class='btn btn-link btn-sm btn-flat'><i class='fa fa-search'></i> View Receipt</a></td> 
                              </tr>";



                          }



                              }
                             

                        


                      }
                      catch(PDOException $e){
                    echo "There is some problem in connection: " . $e->getMessage();
                  }

                      $pdo->close();
                    ?>
                    </tbody>
                  </table>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
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