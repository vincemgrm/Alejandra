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
   Contact Info
      </h1>
     
       
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
            
            </div>
           <div class="box-body">
              <table id="example1" class="table table-bordered">
             
                 
                  <th>E-mail</th>
                  <th>Contact Number</th>
                  <th>Address</th>
                  
               
          
                  <?php
                    $conn = $pdo->open();

                    try{
                      
                      $stmt = $conn->prepare("SELECT * FROM contactus");
                      $stmt->execute();
                      foreach($stmt as $row){
                       
                     
                        echo "
                          <tr>
                           <td>
                              ".$row['email']."
                             
                            </td>
                            <td>
                              ".$row['contactno']."
                              
                            </td>
                            <td>
                              ".$row['address']."
                             
                            </td>
                           
                           
                          </tr>
                          <tr>
                           <td colspan='3' align='center'>
                             
                              <button class='btn btn-primary btn-sm editcontact btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> UPDATE CONTACT INFO</button>
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
             
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/editcontact_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

 

   $(document).on('click', '.editcontact', function(e){
    e.preventDefault();
    $('#editcontact').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
 
  

 
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'contactus_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#id').val(response.id);
      $('#edit_email').val(response.email);
      $('#edit_contactno').val(response.contactno);
      $('#edit_address').val(response.address);
      
    }
  });
}
</script>
</body>
</html>
