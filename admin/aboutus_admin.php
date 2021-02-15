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
     About Us
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
             
                  <th>Profile</th>
                  <th>Identity</th>
                  <th>Vision</th>
                  <th>Mission</th>
                  
               
          
                  <?php
                    $conn = $pdo->open();

                    try{
                      
                      $stmt = $conn->prepare("SELECT * FROM aboutus");
                      $stmt->execute();
                      foreach($stmt as $row){
                       
                     
                        echo "
                          <tr>
                           <td>
                              ".$row['profile']."

                             
                            </td>
                             <td>
                              ".$row['identity']."
                             
                            </td>
                           <td>
                              ".$row['vision']."
                             
                            </td>
                            <td>
                              ".$row['mission']."
                               
                            </td>
                           
                           
                          </tr>
                          <tr>
                           <td colspan='4' align='center'>
                             
                               <button class='btn btn-primary btn-sm editaboutus btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> UPDATE ABOUT US</button>
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
    <?php include 'includes/editaboutus_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

 

   $(document).on('click', '.editaboutus', function(e){
    e.preventDefault();
    $('#editaboutus').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
 
  

 
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'aboutus_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#id').val(response.id);
      $('#edit_profile').val(response.profile);
      $('#edit_identity').val(response.identity);
      $('#edit_vision').val(response.vision);
      $('#edit_mission').val(response.mission);
      
      
    }
  });
}
</script>
</body>
</html>
