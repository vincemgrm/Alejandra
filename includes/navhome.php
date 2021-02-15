<header class="main-header">
  
  <nav class="navbar navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="index.php" ><img src="images/received_265696521033429.png" width="120px"></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">HOME</a></li>
          <li><a href="aboutus.php">ABOUT US</a></li>
          <li><a href="contactus2.php" name="contactus">CONTACT US</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORY <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
          </li>
        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group">
              <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
              <span class="input-group-btn" id="searchBtn" style="display:none;">
                  <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
              </span>
          </div>
        </form>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->

      <?php
                $now=date('Y-m-d');
                $due1=date('Y-m-d', strtotime($now.'+ 2 days'));
                $due2=date('Y-m-d', strtotime($now.'+ 1 days'));
             
                $conn = $pdo->open();

                $stmt1 = $conn->prepare("SELECT * FROM payment WHERE user_id=:user_id AND remarks=:remarks");
                $stmt1->execute(['user_id'=>$user['id'], 'remarks'=>"unpaid"]);
                $pay= $stmt1->fetch();

               
                $stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM payment WHERE due_date=:due_date  AND remarks=:remarks AND user_id=:user_id " );
                $stmt2->execute([ 'due_date'=>$due1, 'remarks'=>"unpaid",'user_id'=>$user['id']]);
                $value1 = $stmt2->fetch();
                $ctr1 = $value1['numrows'];
                                            


               
                $stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM payment WHERE due_date=:due_date  AND remarks=:remarks AND user_id=:user_id " );
                $stmt2->execute([ 'due_date'=>$due2, 'remarks'=>"unpaid",'user_id'=>$user['id']]);
                $value2 = $stmt2->fetch();
                $ctr2 = $value2['numrows'];

                $stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM payment WHERE due_date=:due_date  AND remarks=:remarks AND user_id=:user_id " );
                $stmt2->execute([ 'due_date'=>$now, 'remarks'=>"unpaid",'user_id'=>$user['id']]);
                $value3 = $stmt2->fetch();
                $ctr3 = $value3['numrows'];

                $stmt2 = $conn->prepare("SELECT COUNT(*) AS numrows FROM payment WHERE due_date<:due_date  AND remarks=:remarks AND user_id=:user_id " );
                $stmt2->execute([ 'due_date'=>$now, 'remarks'=>"unpaid",'user_id'=>$user['id']]);
                $value4 = $stmt2->fetch();
                $ctr4 = $value4['numrows'];
              
                $ctrn=$ctr1+$ctr2+$ctr3+$ctr4;
               

      ?>
      <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell"></i><span class="badge badge-pill bg-danger  float-right">
            <?php  echo $ctrn ;  ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifications</li>
              <li>
                <?php

                 if(isset($_SESSION['user'])){
                $now=date('Y-m-d');
                $due1=date('Y-m-d', strtotime($now.'+ 2 days'));
                $due2=date('Y-m-d', strtotime($now.'+ 1 days'));
                $conn = $pdo->open();
               

     

          

          $stmt1 = $conn->prepare("SELECT * FROM payment WHERE user_id=:user_id AND remarks=:remarks");
          $stmt1->execute(['user_id'=>$user['id'], 'remarks'=>"unpaid"]);


          foreach ($stmt1 as $row) {
            if($due1==$row['due_date']){
             
                ?>
               
                <ul class="menu" style="font-family: sans-serif;" ><i class="fa fa-circle"></i> You only have two days left to pay your Transaction No. <?php echo $row['transaction_no']; ?> with the Payment ID 0000<?php echo $row['payment_id']; ?><br>
                 
                </ul>
                <br>
                 
            
              <?php 
                    
                    }
                elseif($due2==$row['due_date']){

                    ?>
                     <ul class="menu" style="font-family: sans-serif;" ><i class="fa fa-circle"></i> You only have one day left to pay your Transaction No. <?php echo $row['transaction_no']; ?> with the Payment ID 0000<?php echo $row['payment_id']; ?><br>
                 
                </ul>
                <br>
                

              <?php
                  }

                   elseif($now==$row['due_date']){
                  ?>
                  <ul class="menu" style="font-family: sans-serif;" ><i class="fa fa-circle"></i> Today is your due date to pay your Transaction No. <?php echo $row['transaction_no']; ?> with the Payment ID 0000<?php echo $row['payment_id']; ?>. You are advised to pay your transaction until today or a penalty fee(2% of the total price) will be added to your account. <br>
                 
                </ul>
                <br>
                 <br>
                  <br>
                   <br>


                <?php

                  }
                  elseif($now>$row['due_date']){
                  ?>
                  <ul class="menu" style="font-family: sans-serif;" ><i class="fa fa-circle"></i> Your payment is overdue for your Transaction No. <?php echo $row['transaction_no']; ?> with the Payment ID 0000<?php echo $row['payment_id']; ?>. Hence a penalty fee(2% of the total price) is added to your account.<br>
                 
                </ul>
                <br>
                 <br>
                  <br>
                   <br>
                  <?php
                  }
                  }

            

            
                }

                      $pdo->close();
                    ?>
              </li>
              <li class="footer"><button class="btn btn-default" align="center" style="width:278px;">Close</button></li>
            </ul>
          </li>
            <!-- Menu toggle button -->
                
            <!-- Menu toggle button -->
            
          
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>LOGIN</a></li>
                
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>