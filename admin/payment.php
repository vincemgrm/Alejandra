

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


$stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM payment WHERE transaction_no=:transaction_no and remarks=:remarks " );
$stmt2->execute(['transaction_no'=>$_GET['transaction'],'remarks'=>'unpaid']);
$value = $stmt2->fetch();
$ctr = $value['numrows'];

$stmt1 = $conn->prepare("SELECT * FROM transaction WHERE user_id=:user_id AND transaction_no=:transaction_no");
$stmt1->execute(['user_id'=>$user['id'],'transaction_no'=>$_GET['transaction']]);
$tran = $stmt1->fetch();

//update penalty
$stmt = $conn->prepare("SELECT * FROM payment WHERE transaction_no=:transaction_no ");
$stmt->execute(['transaction_no'=>$_GET['transaction']]);
                       
$newbal=0;
$penalty=0;
$amount_to_be_paid = 0;
$newad=0;
$dpen=0;
$pen=0;
$nb=0;
foreach ($stmt as $row) {

if($row['remarks']=="unpaid" AND $row['due_date'] < date('Y-m-d')){
$penalty = $tran['total_amount'] * 0.02;
$newbal  = $tran['balance']+$penalty;
$pen+=$penalty;
$nb+=$newbal;
$stmt = $conn->prepare("UPDATE transaction SET balance=:balance, penalty=:penalty WHERE transaction_no=:transaction_no");
$stmt->execute(['balance'=>$nb, 'penalty'=>$pen, 'transaction_no'=>$_GET['transaction']]);

$dpen+=$penalty/$ctr;
$newad+=$dpen+$row['amount_due'];

$stmt = $conn->prepare("UPDATE payment SET amount_due=:amount_due  WHERE remarks=:remarks");
$stmt->execute(['amount_due'=>$newad, 'remarks'=>"unpaid"]);
                       }
                        

                      }

     

   

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
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $user['firstname'].' '.$user['lastname'].'`s Payment History' ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Clients</li>
        <li class="active">Payment History</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h5><i class='icon fa fa-warning'></i> Error!</h5>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h5><i class='icon fa fa-check'></i> Success!</h5>
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
              
<a href='transactionx.php?user=".$_GET['user']." ' class='btn btn-sm btn-primary btn-flat'><i class='fa fa-arrow-left'></i> Go Back</a>

";?>
            </div>


<?php
echo "<fieldset><legend> Transaction No. ".$_GET['transaction']."</legend>";

?>
            <div class="col-sm-4">

<?php 
                      if($trans['balance']<=0){

                    echo "
                       <h5> Total Price: </h5><hr>
                        <h5> Initial Payment: </h5><hr>
                        <h5> Total Payment: </h5><hr>
                        <h5>Balance:</h5><hr>
                          <h5>Remarks: </h5><hr>
                       
                       
                       
                    </div>
                    <div class='col-sm-6'>
                      
                          
                       <h5> Php".number_format($trans['total_amount'], 2)."</h5><hr>
                       <h5> Php".number_format($trans['initial_dp'], 2)." <span class='pull-right'><h5><i class='fa fa-search'></i><a href='initial.php?transaction=".$_GET['transaction']."&user=".$_GET['user']."'>View Reciept</a></h5></h5><hr>
                        <h5> Php ".number_format($trans['total_amount'], 2)."</h5><hr>
                        <h5> Php ".number_format(0, 2)."</h5><hr>
                          <h5>PAID </h5><hr>
                        
                       ";



                      }
                      else{
                         echo "
                          <h5> Total Price: </h5><hr>
                          <h5> Initial Payment: </h5><hr>
                          <h5> Total Payment: </h5><hr>
                          <h5>Balance:</h5><hr>
                          <h5>Remarks: </h5><hr>
                         
                          <h5>  Penalty: </h5><hr>
                    </div>
                    <div class='col-sm-6'>
                          
                        <h5> Php".number_format($trans['total_amount'], 2)."</h5><hr>
                        <h5> Php".number_format($trans['initial_dp'], 2)." <span class='pull-right'><h5><i class='fa fa-search'></i>
                            <a href='initial.php?transaction=".$_GET['transaction']."&user=".$_GET['user']."'>View Reciept</a></h5></h5><hr>
                        <h5> Php ".number_format($trans['amountpaid'], 2)."</h5><hr>
                        <h5> Php" .number_format($trans['balance'], 2)."</h5><hr>
                        <h5>UNPAID</h5><hr>
                       
                        <h5> Php" .number_format($trans['penalty'], 2)."</h5><hr>

                        "; 

$conn = $pdo->open();

//       $stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM payment WHERE transaction_no=:transaction_no and remarks=:remarks " );
//       $stmt2->execute(['transaction_no'=>$_GET['transaction'],'remarks'=>'unpaid']);
//       $value = $stmt2->fetch();
//       $ctr = $value['numrows'];

      

                
// $stmt = $conn->prepare("SELECT * FROM payment WHERE transaction_no=:transaction_no ");
// $stmt->execute(['transaction_no'=>$_GET['transaction']]);
                       
// $newbal=0;
// $penalty=0;
// $amount_to_be_paid = 0;
// $newad=0;
// $dpen=0;
// $pen=0;
// $nb=0;
//                        foreach ($stmt as $row) {

//                         if($row['remarks']=="unpaid" AND $row['due_date'] < date('Y-m-d')){
// $penalty = $trans['total_amount'] * 0.02;
// $newbal  = $trans['balance']+$penalty;
// $pen+=$penalty;
// $nb+=$newbal;
// $stmt = $conn->prepare("UPDATE transaction SET balance=:balance, penalty=:penalty WHERE transaction_no=:transaction_no");
// $stmt->execute(['balance'=>$nb, 'penalty'=>$pen, 'transaction_no'=>$_GET['transaction']]);

// $dpen+=$penalty/$ctr;
// $newad+=$dpen+$row['amount_due'];

// $stmt = $conn->prepare("UPDATE payment SET amount_due=:amount_due  WHERE remarks=:remarks");
// $stmt->execute(['amount_due'=>$newad, 'remarks'=>"unpaid"]);
//                        }
                        

//                       }
                     
                      }
                      ?>

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
              <table class="table table-bordered" id="example1"> 
                    <thead>
                      <th class="hidden"></th>
                      <th>Payment ID</th>
                      <th>Duedate</th>
                      <th>Amount Due</th>
                      <th>Remarks</th>
                      <th>Action</th>
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
                           
     $stmt = $conn->prepare("SELECT * FROM payment WHERE transaction_no=:transaction_no and payment_id<:payment_id order by `payment_id` desc LIMIT 1");
                        $stmt->execute(['transaction_no'=>$_GET['transaction'],'payment_id'=>$row['payment_id']]);
                        $prev = $stmt->fetch();
                          
                          $now=date('Y-m-d');
                          $due1=date('Y-m-d', strtotime($now.'+ 2 days'));
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
                          elseif($now==$row['due_date']&&$row['remarks']=="unpaid"){

                            echo "
                            <tr style='color:red;'>
                            ";
                          }
                           elseif($now>$row['due_date']&&$row['remarks']=="unpaid"){

                            echo "
                            <tr style='color:red;'>
                            ";
                          }
                          elseif($row['remarks']=="paid"){
                             echo "
                            <tr>
                            ";

                          }



                          echo "
                           
                              <td class='hidden'></td>
                               <td>".$pid."</td>
                               
                              <td>".date('M d, Y', strtotime($row['due_date']))."</td>
                              <td>Php ".number_format($row['amount_due'],2)."</td>
                              <td>".$row['remarks']."</td> ";
                              ?>
                              <?php 
                              if($row['remarks']=="unpaid"){

if($prev['remarks'] == "paid" or $prev['remarks'] == ""){
 echo "
                  
                              <td><button class='btn btn-success btn-sm check_payment btn-flat' data-id='".$row['payment_id']." ><i class='fa fa-check'></i> Check Payment</button>  </td>
                            </tr>
                          ";
}else {
   echo "
                  
                              <td ><button class='btn btn-secondary btn-sm  btn-flat' > N/A</button>  </td>
                            </tr>
                          ";
}
                            
                            

                            }

                            elseif($row['remarks']=="paid"){
                              echo "
                  
                              <td><button class='btn btn-info btn-flat' disabled ><i class='fa fa-check'></i> Confirmed</button>
                              <a href='invoicesample.php?transaction=".$_GET['transaction']."&user=".$_GET['user']."&payment=".$row['payment_id']."' class='btn btn-link btn-sm btn-flat'><i class='fa fa-search'></i>View Receipt</a></td>
                            </tr>
                          ";
                        }
                      }
                      else{

                        echo "
                            <tr>
                              <td class='hidden'></td>
                               <td>".$pid."</td>
                               
                              <td>".date('M d, Y', strtotime($row['due_date']))."</td>
                              <td>paid</td> 
                               <td><a href='#' class='btn btn-info btn-flat'><i class='fa fa-check' disabled></i> Confirmed</a>   
                               <a href='invoicesample.php?transaction=".$_GET['transaction']."&user=".$_GET['user']."&payment=".$row['payment_id']."' class='btn btn-link btn-sm btn-flat'><i class='fa fa-search'></i>View Receipt</a></td>
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

 $(document).on('click', '.add_penalty', function(e){
    e.preventDefault();
    $('#add_penalty').modal('show');
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
      $('#amount_due').html(response.amount_due);
  
    }
   

  //  
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

     