

<?php
  include 'includes/session.php';

  
   

  if(!isset($_GET['user'])){
    header('location: users.php');
    exit();
  }
  else{
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id'=>$_GET['user']]);
    $user = $stmt->fetch();

    $id=$user['id'];
    

$now = date('Y-m-d');


     

  

  

  
   

 $stmt1 = $conn->prepare("SELECT * FROM transaction WHERE user_id=:user_id AND transaction_no=:transaction_no");
  $stmt1->execute(['user_id'=>$user['id'],'transaction_no'=>$_GET['transaction']]);
  $trans = $stmt1->fetch();
 
    $pdo->close();
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini" onload="window.print();" onafterprint="history.back();" >
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $user['firstname'].' '.$user['lastname'].'`s Payment Details' ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Clients</li>
        <li class="active">Payment History</li>
        <li class="active">Receipt</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <?php echo"
              
<a href='users.php' class='btn btn-sm btn-primary btn-flat hidden-print'><i class='fa fa-arrow-left'></i> Clients</a>

";?>
            </div>
            <div class="box col-sm-2">
            <div class="box-header with-border">

               <img src="../images/IMG_20191102_000401.jpg" width="200px">
            


<?php
echo "<h5> Transaction No. ".$_GET['transaction']." <br>
Initial Payment  <span class='pull-right'>
Date of Payment: ".date('M d, Y' , strtotime($trans['transaction_date']))."
</h5>
                        <hr>


          
            
" ;

?>
            <div class="col-sm-4">
                       
                        
                      
                      <span class='pull-right'><h5> Total Price:<span class='pull-right'>Php <?php echo number_format($trans['total_amount'], 2);?></h5> <hr>
                      <span class='pull-right'><h5> Total Payment:<span class='pull-right'>Php <?php echo number_format($trans['initial_dp'], 2);?> </h5> <hr>
                      <span class='pull-right'><h5>Balance:<span class='pull-right'>Php <?php echo number_format($trans['balance'], 2);?></h5> <hr>
                      <span class='pull-right'><h5>Amount to pay:<span class='pull-right'>Php <?php echo number_format($trans['total_amount']*.2, 2);?></h5> <hr>
                      <span class='pull-right'> <h5>Cash:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='pull-right'>Php <?php echo number_format($trans['initial_dp'], 2);?></h5> <hr>
                      
                  
                    </div>
                    
                     
               
</div>
</div>
            <div class="box-body">

           <br/>
            <br/>
          <br/>
          <br/>
            <br/>
          <br/>
          <div>
          </div>
           
          
 <div>
          </div>
           <div>
          </div>
           <div>
          </div>
<br/>
            <br/>
          <br/>
          <br/>
            <br/>
          <br/>
             
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/cart_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
 
  
 $(document).on('click', '.check_payment', function(e){
    e.preventDefault();
    $('#check_payment').modal('show');
    var id = $(this).data('id');
    getrow(id);
  });

 $(document).on('click', '.bigger_payment', function(e){
    e.preventDefault();
    $('#bigger_payment').modal('show');
    var id = $(this).data('id');
    getrow(id);
  });
  
   $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

    function getrow(id){
  $.ajax({
    type: 'POST',
    url: 'payment_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#payment_id').val(response.payment_id);
      $('#userid').val(response.user_id);
      $('#transaction_no').val(response.transaction_no);
      $('#remarks').html(response.remarks);
      
    }
     });


    


 

  

  //   function getpayment(id){
  // $.ajax({
  //   type: 'POST',
  //   url: 'payment_row2.php',
  //   data: {id:id},
  //   dataType: 'json',
  //   success: function(response){
  //     $('#payment_id').val(response.payment_id);
  //     $('#userid').val(response.user_id);
  //     $('#transaction_no').val(response.transaction_no);
  //     $('#remarks').html(response.remarks);
      
  //   }
  //    });
   
}
</script>
</body>
</html>

     