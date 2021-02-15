

<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Suggestions/Comments</b></h3>
	  	</div>
	  	<div class="box-body">
	    	<p>Leave your comment here</p>
	    	<form method="POST" action="">
		    	<div class="input-group">
	                <textarea name="comment" style="height: 50px; width:260px" class="form-control"></textarea>
	          
	           
	                    <button style="width: 260px;" type="submit" name="sendcomment" class="btn btn-info btn-flat"> send</button>
	                </span>
	            </div>
		    </form>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Most Viewed Today</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul>
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
	  			$stmt->execute(['now'=>$now]);

	  			foreach($stmt as $row){
	  				if($row<=0){
	  						echo" No Views yet for today";
	  				
	  			}
	  			else{
	  			
	  				
	  				echo "<li><a href='product.php?product=".$row['slug']."'>".$row['name']."</a> (".$row['counter']." views)</li>";
	  			}
	  			}

	  			$pdo->close();
	  		?>
	    	<ul>
	  	</div>
	</div>
</div>
<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Top Sellers</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul>
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE cart.quantity>10 ORDER BY cart.quantity DESC LIMIT 10");
	  			$stmt->execute(['now'=>$now]);

	  			foreach($stmt as $row){
	  				
	  				
	  				echo "<li><a href='product.php?product=".$row['slug']."'>".$row['name']."</a> (".$row['quantity']." sold items)</li>";
	  			
	  			}

	  			$pdo->close();
	  		?>
	    	<ul>
	  	</div>
	</div>
</div>

<div class="row">
	<div class='box box-solid'>
	  	<div class='box-header with-border'>
	    	<h3 class='box-title'><b>Follow us on Facebook</b></h3>
	  	</div>
	  	<div class='box-body'align="center">
	    	<a href="https://www.facebook.com/alejandra-enterprises-1219632988078234/" class="btn btn-facebook" style="width:100px;">Facebook</a>
	    	
	  	</div>
	</div>
</div>

<?php
	

	if(isset($_POST['sendcomment'])){
		$comment = $_POST['comment'];

		$conn = $pdo->open();

		
				$stmt = $conn->prepare("INSERT INTO comments (comment) VALUES (:comment)");
				$stmt->execute(['comment'=>$comment ]);
				echo "<script>alert('comment sent')</script>"; 
			
			
		$pdo->close();
	}
	else{
		}

	

?>
