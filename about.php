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
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="https://www.anc.edu/pathways/images/job-search.jpg" alt="" style="height: 450px;">
         <img src="https://thejobfactory.in/wp-content/uploads/2023/03/in_demand_jobs.jpg" alt="" style="height: 450px;">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>JobNest has evolved from being a 'job board' to a global provider of everything you need for a successful career. We've been in the pursuit of connecting people with the right job opportunities for over two decades now. We understand your needs better than anyone else and know when recruiters are looking for someone exactly like you.</p>
         <p>We live in a world where every experience can be highly personalised, so why should job hunting be any different? foundit aims to be the perfect picture of customisation. In a vast sea of opportunities, we can fish out the right ones for you by catering to what you need - be it learning new skills, an inclusive workplace, mentorship, a fast-track career, a place to hustle or somewhere you can keep things flexible.</p>
         <p>At the heart of our success and our future is innovation. We are building some of the best technology to customise our search results, keeping in mind that your job title doesn't define your potential. So much so that two of you from the same field will see completely different results for the same query. Decades of industry insights and new-age technology have come together to bring you the perfect career experience.</p>
         <p>If you are looking for your path to different possibilities, it's time to JobNesting!</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">client's reviews</h1>

   <div class="box-container">

      
      <div class="box">
         <img src="https://cdn.dnaindia.com/sites/default/files/2023/08/31/2605661-mukesh-ambani.jpg?im=FitAndFill=(1200,900)" alt="">
         <p>JobNest is a Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem qui fugiat ipsum iste aperiam? Aliquid at alias, blanditiis reiciendis eveniet, pariatur officiis enim beatae, eos cum praesentium dicta expedita quae!.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Mukesh Ambani</h3>
      </div>

      <div class="box">
         <img src="https://cdn.britannica.com/82/245982-050-982BF8CD/Gautam-Adani-Adani-Group-2012.jpg" alt="">
         <p> JobNest is this and thatLorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Gautham Adani</h3>
      </div>

   </div>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>