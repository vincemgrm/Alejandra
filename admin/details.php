

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
         <h1>
        <?php echo $user['firstname'].' '.$user['lastname'].'`s Cart' ?>
      </h1>
      </h1>
      
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
              
            <button onclick="goBack()" class="btn btn-sm btn-flat btn-info"><i class="fa fa-arrow-left"></i> Go Back</button>
            <script>
function goBack(){

window.history.back();

}



            </script>
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
                      $stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id LEFT JOIN transaction ON transaction.transaction_no=cart.transaction_no WHERE transaction.transaction_no=:transaction_no");
                      $stmt->execute(['transaction_no'=>$_GET['transaction']]);

                      foreach($stmt as $row){
                          $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                        $total = $total + ($row["quantity"] * $row["price"]);

                    ?>
                       
                          <tr>
                          <td><?php echo "<img src='".$image."' height='100px'>"?></td>
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

      