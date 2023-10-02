<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['delete'])){
   $delete_id = $id;
   mysqli_query($conn, "DELETE FROM `joblist` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <style>
   #sud{
      border:0px;
   }
</style>
</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="title">all jobs</h1>

   <div class="box-container">
   <?php
         $select_jobs = mysqli_query($conn, "SELECT * FROM `joblist`") or die('query failed');
         if(mysqli_num_rows($select_jobs) > 0){
            while($fetch_jobs = mysqli_fetch_assoc($select_jobs)){
      ?> 

      <div class="box" id="sud">
         <h4 style="font-size:xx-large;">Job Role : <?php echo $fetch_jobs['role']; ?> </h4>
         <div style="font-size:x-large;"> Company : <?php echo $fetch_jobs['cname']; ?> </div>
         <div style="font-size:x-large;"> Package : <?php echo $fetch_jobs['package']; ?> LPA</div>
         <div style="font-size:x-large;"> Skills : <?php echo $fetch_jobs['skill']; ?> LPA</div>
         <div style="font-size:x-large;"> work location : <?php echo $fetch_jobs['place']; ?> </div>
         <div style="font-size:x-large;"> Last date : <?php echo $fetch_jobs['date']; ?> </div>
         <form action="delete.php" method="post">
         <input type="hidden" name="id" value="<?php echo $id=$fetch_jobs['id']; ?>">
           <input type="submit" name="delete" class="delete-btn" value="delete">
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">No job applications are added yet!</p>';
      }
      ?>
   

</section>

<!-- admin dashboard section ends -->

<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>

<!-- 
 $select_cart = mysqli_query($conn, "SELECT * FROM `joblist`") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
            }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }  -->