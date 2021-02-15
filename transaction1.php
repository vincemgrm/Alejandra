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
	        				
	        				
	        				<h4 class="box-title"><i class="fa fa-list"></i> <b>Full Details</b></h4>
	        				<span class="pull-right">
	        				<?php echo "<a href='profile.php?user=".$user['id']."' class='btn btn-sm btn-flat btn-info''><i class='fa fa-arrow-left'></i> Back</a>"?>
	        			</span>
	        			</div>
	        			<div class="box-body">
	        				<table class="table table-bordered">
		        			<thead>
		        				
		        				<th>Photo</th>
		        				<th>Name</th>
		        				<th>Price</th>
		        				<th>Quantity</th>
		        				<th>Subtotal</th>
		        			</thead>
		        			<tbody id="tbody">
		        			 <?php

                    $conn = $pdo->open();
                     $total=0;
                    try{
                      $stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id LEFT JOIN transaction ON transaction.transaction_no=cart.transaction_no WHERE transaction.user_id=:user_id and transaction.transaction_no=:transaction_no");
                      $stmt->execute(['user_id'=>$user['id'],'transaction_no'=>$_GET['transaction']]);
                      foreach($stmt as $row){

                        $total = $total + ($row["quantity"] * $row["price"]);

                    ?>
                       
                          <tr>
                          <td><img src="images/<?php echo $row['photo'];?>" width="100px"></td>
                          <?php
                           echo "
                            <td>".$row['name']."</td>
                                <td>".$row['price']."</td>
                            <td>".$row['quantity']."</td>
                        
                            <td>"."Php".number_format($row['quantity']*$row['price'],2)."</td>
                           
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                   <tr>  

       <td colspan="4" align="center">TOTAL PRICE </td>  

       <td  colspan="">Php<?php echo number_format($total,2);?></td>  
                              
    </tr> 
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