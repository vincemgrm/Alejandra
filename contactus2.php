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
                    

     

   

 $stmt1 = $conn->prepare("SELECT * FROM contactus WHERE id=1");
  $stmt1->execute();
  $row = $stmt1->fetch();
  
 

   $pdo->close();
                    ?>


                     <fieldset style="box-shadow: black; margin-left:5px;"><legend style="background: grey; color:white;"><h4 style="margin-left: 25px;">Email</h4></legend>
                        <?php echo $row['email'] ; ?>
                        

                    </fieldset>
                    <br>
                    <br>
                    <fieldset style="box-shadow: black; margin-left:5px;"><legend style="background: grey; color:white;"><h4 style="margin-left: 25px;">Contact No.</h4></legend>
                        <?php echo $row['contactno'] ; ?>
                        

                    </fieldset>
                    <br>
                    <br>
                    <fieldset style="box-shadow: black; margin-left:5px;"><legend style="background: grey; color:white;"><h4 style="margin-left: 25px;">Address</h4></legend>
                        <?php echo $row['address'] ; ?>
                        

                    
                                  

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