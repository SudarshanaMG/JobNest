<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
   #id1{
      font-size: 2rem;
   }
   #id2{
      font-size: 3rem;
   }
   #id3{
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
   }
   #id4{
      width: 30%;
      position: relative;
      display: block;
      left: 100px;
   }
   </style>
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>search page</h3>
   <p> <a href="home.php">home</a> / search </p>
</div>

<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="search job role" class="box">
      <input type="submit" name="submit" value="search" class="btn">
   </form>
</section>

<div class="container" id="id4">
<div class="row">
   <?php
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         $select_jobs = mysqli_query($conn, "SELECT * FROM `joblist` WHERE role LIKE '%{$search_item}%'") or die('query failed');
         if(mysqli_num_rows($select_jobs) > 0){
         while($fetch_jobs = mysqli_fetch_assoc($select_jobs)){
   ?>
   <div class="col-md-4">
    <div class="card" id="id3">
      <div class="card-body" style="margin:20px;">
        <h5 class="card-title" id="id2">Job Role : <?php echo $fetch_jobs['role']; ?> </h5>
        <Company class="card-text" id="id1">Company : <?php echo $fetch_jobs['cname']; ?> </p>
        <p class="card-text" id="id1">Package : <?php echo $fetch_jobs['package']; ?> LPA </p>
        <p class="card-text" id="id1">Last date to apply : <?php echo $fetch_jobs['date']; ?></p>
        <form action="applyjob.php" method="post">
         <input type="hidden" name="id" value="<?php echo $id=$fetch_jobs['id']; ?>">
           <input type="submit" name="apply" class="btn" value="Know more" style="background-color:blue;">
         </form>
      </div>
    </div>
     </div>
     <?php
         }
      }else{
         echo '<p class="empty">No job applications are added yet!</p>';
      }
   }
      ?>
 
</div>
</div>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>