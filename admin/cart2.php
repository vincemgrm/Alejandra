

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
        <?php echo $user['firstname'].' '.$user['lastname'].'`s Cart' ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Users</li>
        <li class="active">Cart</li>
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
              <a href="#addnew" data-toggle="modal" id="add" data-id="<?php echo $user['id']; ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
              <a href="users.php" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Users</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                   <th>Subtotal</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();
                    $total=0;
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
       $stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE  user_id=:user_id and transaction_no=:transaction_no");
                      $stmt->execute([ 'user_id'=>$id, 'transaction_no'=>$ctr]);
                     
                      echo "Transaction No ".$ctr;            
                foreach($stmt as $row){
                        $total = $total + ($row["quantity"] * $row["price"]);
                        echo "
                          <tr>
                            <td>".$row['name']."</td>
                            <td>".$row['quantity']."</td>
                            <td>".$row['price']."</td>
                            <td>"."Php".number_format($row['quantity']*$row['price'],2)."</td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['cartid']."'><i class='fa fa-edit'></i> Edit Quantity</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['cartid']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
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
                    <form action="cart_modal.php" method="POST">
 <?php

 echo "
       <td colspan='2' align='center'>TOTAL PRICE </td>  

       <td id='total-price' align='right'>Php ".number_format($total,2)."</td>
       <td id='poutput'></td>
     
       <input type='hidden' id='totalprice' value=".$total.">
       <input type='hidden' name='userid' id='userid' value=".$_GET['user']."'>
                              
    </tr> 
   


<tr>  

       <td colspan='5' align='center'> <button type='submit' id='submittotalprice' name='submit' class='btn btn-primary btn-sm send_transaction btn-flat' > Submit Transaction</button> </td>  
       
      
                              
    </tr> 





"

    ?>

    
         </form>      
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

<script type="text/javascript">
    function test(x){
      document.getElementById('y').value = x;
    }
</script>
</body>
</html>