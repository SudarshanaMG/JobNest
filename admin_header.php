<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<style>
   #id1:hover{
      color: blue;
   }
</style>
<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Admin<span style="color: blue;">Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php" id="id1">Home</a>
         <a href="admin_newjob.php" id="id1">New</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span style="color: blue;"><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span style="color: blue;"><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <!-- <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div> -->
      </div>

   </div>

</header>