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
       Advertisements
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
              <table id="example1" class="table table-bordered table-dark">
             
                 
                  <th>Advertisement Photo</th>
                  
               
          
                  <?php
                    $conn = $pdo->open();

                    try{
                      
                      $stmt = $conn->prepare("SELECT * FROM upload");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['name'])) ? ''.$row['name'] : '../images/noimage.jpg';
                     
                        echo "
                          <tr>
                           
                            <td>
                              <img src='".$image."' height='100px'>
                               <span class='pull-right'> <button class='btn btn-success btn-sm update_ad btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Update</button></span>
                            </td>
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
    <?php include 'includes/ad_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

 

    $(document).on('click', '.update_ad', function(e){
    e.preventDefault();
    $('#update_ad').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
 
  

 
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'upload_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#id').val(response.id);
      $('#name').val(response.name);


   
      
    }
  });
}
</script>
</body>
</html>
