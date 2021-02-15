<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    


<?php
    include 'includes/session.php';

    if(isset($_POST['upload'])){
        $id = $_POST['id'];
        $photo = $_FILES['photo']['name'];


        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT * FROM upload WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        $row = $stmt->fetch();
if(!empty($photo)){
                $ext = pathinfo($photo, PATHINFO_EXTENSION);
            $new_filename = 'uploads/'.$photo;
                move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$photo);
                
            }
        
        try{
            $stmt = $conn->prepare("UPDATE upload SET name=:name WHERE id=:id");
            $stmt->execute(['name'=>$new_filename, 'id'=>$id]);
            $_SESSION['success'] = 'Advertisement photo updated successfully';
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }

        $pdo->close();

    }
    else{
        $_SESSION['error'] = 'Select product to update photo first';
    }

    header('location: edit_ad.php');
?>
<br/>

</div>
</body>