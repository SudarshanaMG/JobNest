<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
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
<h3 class="title">Your job applications</h3>
<div class="container">
<div class="row">
  
  <?php
         $select_jobs = mysqli_query($conn, "SELECT * FROM `joblist`,`jobapplied` WHERE id = id1") or die('query failed');
         if(mysqli_num_rows($select_jobs) > 0){
            while($fetch_jobs = mysqli_fetch_assoc($select_jobs)){
      ?> 
<div class="col-md-4">
    <div class="card" id="id3">
      <div class="card-body">
      <h5 class="card-title" id="id2">Job Role : <?php echo $fetch_jobs['role']; ?> </h5><hr>
        <p class="card-text" id="id1">Company Name : <?php echo $fetch_jobs['cname']; ?>  </p><hr>
        <p class="card-text" id="id1">Package(CTC) : <?php echo $fetch_jobs['package']; ?> LPA </p><hr>
        <p class="card-text" id="id1">Skills required : <?php echo $fetch_jobs['skill']; ?> </p><hr>
        <p class="card-text" id="id1">work location : <?php echo $fetch_jobs['place']; ?> </p><hr>
        <p class="card-text" id="id1">Last date to apply : <?php echo $fetch_jobs['date']; ?></p><hr>
        <p class="card-text" id="id1">Applied date : <?php echo $fetch_jobs['applidate']; ?></p>
        <form action="deleteappli.php" method="post">
         <input type="hidden" name="id" value="<?php echo $id=$fetch_jobs['id']; ?>">
           <input type="submit" name="delete" class="delete-btn" value="delete application">
         </form>
      </div>
    </div>
     </div>
    <?php
         }
      }else{
         echo '<p class="empty">You have not applied for any jobs</p>';
      }
      ?>
 
</div>
</div>
<br><br>

<!-- custom js file link  -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</body>
</html>