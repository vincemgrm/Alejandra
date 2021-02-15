<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>



<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    
     
       <div class="content-wrapper">
        <div class="container">

          <!-- Main content -->
          <section class="content">
            <div class="row">
                <div class="col-sm-9">
                    <?php

$conn = $pdo->open();
                    

     

   

 $stmt1 = $conn->prepare("SELECT * FROM aboutus WHERE id=1");
  $stmt1->execute();
  $row = $stmt1->fetch();
  
 

   $pdo->close();
                    ?>


                     <fieldset style="box-shadow: black; margin-left:5px;"><legend style="background: grey; color:white;"><h1 style="margin-left: 25px;">Company Profile</h1></legend>
                       <p style="margin-left: 25px; margin-right: 25px; " align="justify">
                        <?php echo $row['profile'] ; ?>
                        </p>

                    </fieldset>
                    <br>
                    <br>
                    <fieldset style="box-shadow: black; margin-left:5px;"><legend style="background: grey; color:white;"><h1 style="margin-left: 25px;">Company Identity</h1></legend>
                      <p style="margin-left: 25px; margin-right: 25px; " align="justify">
                        <?php echo $row['identity'] ; ?>
                      </p>

                    </fieldset>
                    <br>
                    <br>
                    <fieldset style="box-shadow: black; margin-left:5px;"><legend style="background: grey; color:white;"><h1 style="margin-left: 25px;">Vision</h1></legend>
                       <p style="margin-left: 25px; margin-right: 25px; " align="justify">
                        <?php echo $row['vision'] ; ?>
                        </p>

                    </fieldset>
                    <br>
                    <br>
                     <fieldset style="box-shadow: black; margin-left:5px;"><legend style="background: grey; color:white;"><h1 style="margin-left: 25px;">Mission</h1></legend>
                       <p style="margin-left: 25px; margin-right: 25px; " align="justify">
                        <?php echo $row['mission'] ; ?>
                        </p>

                    </fieldset>
                                  

</div>





                    <body>
                    <div class="col-sm-3">
                    <?php include 'includes/sidebar.php'; ?>
                </div>
</section>
            </div>
</div>  
  
    <?php include 'includes/footer.php'; ?>


<?php include 'includes/scripts.php'; ?>
</body>
</html>