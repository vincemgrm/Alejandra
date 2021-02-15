

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
        <?php echo $user['firstname'].' '.$user['lastname'].'`s Transactions' ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Clients</li>
        <li class="active">Transactions</li>
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
              
              <a href="users.php" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Cients</a>
            </div>
            <div class="box-body">
              <table class="table table-bordered" id="example1">
                    <thead>
                      <th class="hidden"></th>
                      <th>Date</th>
                      <th>Transaction#</th>
                      <th>Total Amount</th>
                      <th>Amount Paid</th>
                      <th>Balance</th>
                      <th>Remarks</th>
                      <th>Full Details</th>
                   
                    </thead>
                    <tbody>
                    <?php
                      $conn = $pdo->open();

                      try{
                        $stmt = $conn->prepare("SELECT * FROM transaction WHERE user_id=:user_id ");
                        $stmt->execute(['user_id'=>$user['id']]);
                        foreach($stmt as $row){
                          /*$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
                          $stmt2->execute(['id'=>$row['id']]);*/
                          
                          if ($row['balance']<=0){
                          echo "
                            <tr>
                              <td class='hidden'></td>
                              <td>".date('M d, Y', strtotime($row['transaction_date']))."</td>
                              <td>".$row['transaction_no']."</td>
                              <td>Php ".number_format($row['total_amount'], 2)."</td>
                               <td>Php ".number_format($row['total_amount'], 2)."</td>
                               <td>Php ".number_format(0, 2)."</td>
                                <td><i class='fa fa-check'></i> PAID</td>
                              

                              <td><a href='details.php?transaction=".$row['transaction_no']."&user=".$user['id']."' class='btn btn-sm btn-flat btn-warning''><i class='fa fa-shopping-cart'></i> View Cart</a>
                              <a href='payment.php?transaction=".$row['transaction_no']."&user=".$user['id']."' class='btn btn-sm btn-flat btn-info''><i class='fa fa-search'></i> Payment</a></td>
                            </tr>
                          ";

                        }
                        else{

                             echo "
                            <tr>
                              <td class='hidden'></td>
                              <td>".date('M d, Y', strtotime($row['transaction_date']))."</td>
                              <td>".$row['transaction_no']."</td>
                              <td>Php ".number_format($row['total_amount'], 2)."</td>
                               <td>Php ".number_format($row['amountpaid'], 2)."</td>
                               <td>Php ".number_format($row['balance'], 2)."</td>
                                <td><i class='fa fa-cross'></i> UNPAID</button></td>
                              

                               <td><a href='details.php?transaction=".$row['transaction_no']."&user=".$user['id']."' class='btn btn-sm btn-flat btn-warning''><i class='fa fa-shopping-cart'></i> View Cart</a>
                              <a href='payment.php?transaction=".$row['transaction_no']."&user=".$user['id']."' class='btn btn-sm btn-flat btn-info''><i class='fa fa-search'></i> Payment</a></td>
                            </tr>
                          ";




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
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


 $(document).on('click', '.send_transaction', function(e){
    e.preventDefault();
    $('#send_transaction').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $('#add').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getProducts(id);
  });

  
  
   $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getProducts(id){
  $.ajax({
    type: 'POST',
    url: 'products_all.php',
    dataType: 'json',
    success: function(response){
      $('#product').append(response);
      $('.userid').val(id);
    }
  });
}

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'cart_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.cartid').val(response.cartid);
      $('.userid').val(response.user_id);
      $('.productname').html(response.name);
      $('#edit_quantity').val(response.quantity);
    }
  });
}
</script>
</body>
</html>

      }
      catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
      }
    }

    $pdo->close();
  
  
  header('location: cart.php?user=' . $id);

?>