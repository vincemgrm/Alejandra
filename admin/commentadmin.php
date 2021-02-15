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
Comments
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
              
                  
               
          
                  <?php
                    $conn = $pdo->open();
                      $ctr=0;
                    try{
                      
                      $stmt = $conn->prepare("SELECT * FROM comments");
                      $stmt->execute();
                      foreach($stmt as $row){
                       $ctr+=1;
                     
                        echo "
                          <fieldset><legend>Comment no. ".$ctr."</legend>
                             <h3> ".$row['comment']."</h3>
                             
                           <br/>
                            
                              <button class='btn btn-danger btn-sm delete-comment btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                            </fieldset>

                            <br><br>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
             
              
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/delcomment_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

 

   $(document).on('click', '.delete-comment', function(e){
    e.preventDefault();
    $('#delete-comment').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
 
  

 
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'comments_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#id').val(response.id);
      $('#edit_email').val(response.email);
      $('#edit_contactno').val(response.contactno);
      
    }
  });
}
</script>
</body>
</html>
