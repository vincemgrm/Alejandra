<?php include 'includes/session.php'; ?>
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
       Sales History
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              
            <div class="container">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active"  href="#sales" data-toggle="tab">Fully Paid Transactions</a>
                </li>
             
                <li class="nav-item">
                  <a class="nav-link" href="#sales2" data-toggle="tab" >Partially Paid Transactions</a>
                </li>
              </ul>
            </div>
            <!-- Tab panes -->
  <div class="tab-content">
    <div id="sales" class="container tab-pane active"><br>
      <h3> Fully-Paid Transaction</h3>
     
  
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Buyer Name</th>
                  <th>Transaction#</th>
                  <th>Amount</th>
                  <th>Full Details</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                       $stmt = $conn->prepare("SELECT * FROM transaction WHERE balance<=0");
                        $stmt->execute();
                      foreach($stmt as $row){
                        $stmt = $conn->prepare("SELECT * FROM users LEFT JOIN transaction ON transaction.user_id=users.id WHERE users.id=:id");
                        $stmt->execute(['id'=>$row['user_id']]);
                        $user=$stmt->fetch();
                        $total = 0;
                        
                        echo "
                          <tr>
                            <tr>
                              <td class='hidden'></td>
                              <td>".date('M d, Y', strtotime($row['transaction_date']))."</td>
                               <td>".$user['firstname']." ".$user['lastname']."</td>
                              <td>".$row['transaction_no']."</td>
                              <td>Php ".number_format($row['total_amount'], 2)."</td>
                              
                            <td><a href='details.php?transaction=".$row['transaction_no']."&user=".$user['id']."' class='btn btn-sm btn-flat btn-warning' ><i class='fa fa-shopping-cart'></i>View Cart</a></td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
        



  
    <div id="sales2" class="container tab-pane fade"><br>
      <h3> Partially-Paid Transaction</h3>
     
  
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Buyer Name</th>
                  <th>Transaction#</th>
                  <th>Amount</th>
                  <th>Full Details</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                       $stmt = $conn->prepare("SELECT * FROM transaction WHERE balance>0");
                        $stmt->execute();
                      foreach($stmt as $row){
                        $stmt = $conn->prepare("SELECT * FROM users LEFT JOIN transaction ON transaction.user_id=users.id WHERE users.id=:id");
                        $stmt->execute(['id'=>$row['user_id']]);
                        $user=$stmt->fetch();
                        $total = 0;
                        
                        echo "
                          <tr>
                            <tr>
                              <td class='hidden'></td>
                              <td>".date('M d, Y', strtotime($row['transaction_date']))."</td>
                               <td>".$user['firstname']." ".$user['lastname']."</td>
                              <td>".$row['transaction_no']."</td>
                              <td>Php ".number_format($row['total_amount'], 2)."</td>
                              
                            <td><a href='details.php?transaction=".$row['transaction_no']."&user=".$user['id']."' class='btn btn-sm btn-flat btn-warning' ><i class='fa fa-shopping-cart'></i>View Cart</a></td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
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
    <?php include '../includes/profile_modal.php'; ?>

</div>

<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<!-- Date Picker -->
<script>
$(function(){
  //Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )
  
});
</script>
<script>
$(function(){
  $(document).on('click', '.transact', function(e){
    e.preventDefault();
    $('#transaction').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#date').html(response.date);
        $('#transid').html(response.transaction);
        $('#detail').prepend(response.list);
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
