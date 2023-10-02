<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_application'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $cname = $_POST['cname'];
   $skills = $_POST['skills'];
   $loc = $_POST['loc'];
   $intd = $_POST['intd'];

      $add_product_query = mysqli_query($conn, "INSERT INTO `joblist`(role, cname,package,skill,place,date) VALUES('$name','$cname','$price','$skills','$loc','$intd')") or die('query failed');

      if($add_product_query){
            $message[] = 'new job applicaiton added successfully!';
         }
      else{
         $message[] = 'new job application could not be added!';
      }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

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

<!-- product CRUD section starts  -->

<section class="add-products">

   <h1 class="title"></h1>

   <form action="" method="post" enctype="multipart/form-data" id="sud">
      <h3>add new job application</h3>
      <input type="text" name="name" class="box" placeholder="enter job role" required>
      <input type="number" min="0" name="price" class="box" placeholder="enter ctc/package" required>
      <input type="text" name="cname" class="box" placeholder="enter company name" required>
      <input type="text" name="skills" class="box" placeholder="skills required" >
      <input type="text" name="loc" class="box" placeholder="workplace location" >
      <input type="date" name="intd" class="box"  >

      <input type="submit" value="add application" name="add_application" class="btn" style="background-color:blue">
   </form>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-products">

   

</section>



<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>