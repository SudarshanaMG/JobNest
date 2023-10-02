<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}
if (isset($_POST['apply'])) {
    $id = $_POST['id'];
 }
if (isset($_POST['applynow'])) {
    $id = $_POST['id'];
    $search = mysqli_query($conn, "SELECT id1 FROM `jobapplied` WHERE id1='$id' AND uid='$user_id' ") or die('query failed');
    if(mysqli_num_rows($search) == 0 ){
        $add_job = mysqli_query($conn, "INSERT INTO `jobapplied`(id1,uid) VALUES('$id','$user_id')") or die('query failed');
        if($add_job){
           $message[] = 'job applicaiton applied successfully';
         }
      else{
         $message[] = 'job application failed';
      }
    }
    else{
        $message[] = 'your application has already been submitted';
    }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
<style>
   body{
      background-color:darkgray;
   }
   #id1{
      font-size: 2rem;
   }
   #id2{
      font-size: 3rem;
   }
   #id3{
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      background-color: aliceblue;
   }
</style>
</head>
<body>
   
<?php include 'header.php'; ?>
<br><br>
<h3 class="title">Job details</h3>
<div class="container" style="text-align:center;">
  
  <?php
         $select_jobs = mysqli_query($conn, "SELECT * FROM `joblist` WHERE id='$id'") or die('query failed');
         if(mysqli_num_rows($select_jobs) > 0){
            while($fetch_jobs = mysqli_fetch_assoc($select_jobs)){
      ?> 
    <div class="card" id="id3">
      <div class="card-body">
        <h5 class="card-title" id="id2">Job Role offered : <?php echo $fetch_jobs['role']; ?> </h5>
        <p class="card-text" id="id1">Company Name : <?php echo $fetch_jobs['cname']; ?>  </p>
        <p class="card-text" id="id1">Package(CTC) : <?php echo $fetch_jobs['package']; ?> LPA </p>
        <p class="card-text" id="id1">Skills required : <?php echo $fetch_jobs['skill']; ?> </p>
        <p class="card-text" id="id1">work location : <?php echo $fetch_jobs['place']; ?> </p>
        <p class="card-text" id="id1">Last date to apply : <?php echo $fetch_jobs['date']; ?></p>
        <form action="applyjob.php" method="post">
         <input type="hidden" name="id" value="<?php echo $id=$fetch_jobs['id']; ?>">
           <input type="submit" name="applynow" class="btn" value="Apply now" style="background-color:blue;">
         </form><br>
         <a href="home.php" class="btn" style="background-color:goldenrod;">go back</a>
         <!-- <button type="button" class="btn" style="background-color:goldenrod;"></button> -->
      </div>
    </div>
    <?php
         }
      }else{
         echo '<p class="empty">Job application not available!</p>';
      }
      ?>
 
</div>
<br><br>

<!-- custom js file link  -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</body>
</html>
