﻿<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>After School Club</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Header starts -->
  <div class="container">
    <div class="row">
      
      <div class="col-md-6 col-sm-6">
          <div class="row">
           
              <div class="col-md-2 col-sm-6">
                <img src="image/C.png" class="img-responsive" width="70" height="70">
              </div>
          
              <div class="col-md-10 col-sm-6" style="padding-top: 16px;">
                <h3>After School Club</h3>
              </div>
          </div>
            
      </div>
      <div class="col-md-6 col-sm-6" id="addLogin" style="text-align: right;">
         <a href="logout.php" ><?php echo $_SESSION['user_name']; ?> logout</a>
      </div>
    </div>
  </div>
  <!-- Header ends -->

   <!-- Navigation menu starts -->
   <!-- Takes help from week 2 lab -->
   <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #a42744;color: white">
      
      <div id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link menuColor" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link menuColor" href="aboutUs.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menuColor" href="clubs.php">Clubs</a>
          </li>         
          <li class="nav-item">
            <a class="nav-link menuColor" href="contactUs.php">Contact us</a>
          </li>
          <?php if($_SESSION['admin'] == 1)
          echo '<li class="nav-item">
            <a class="nav-link menuColor" href="categoryList.php">Category List</a>
          </li>';
          ?>
          <?php if($_SESSION['admin'] == 1)
          echo '<li class="nav-item">
            <a class="nav-link menuColor" href="clubList.php">Club List</a>
          </li>';
          ?>
          <?php if($_SESSION['admin'] == 1)
          echo '<li class="nav-item">
            <a class="nav-link menuColor" href="userClubList.php">User-Club</a>
          </li>';
          ?>
          <?php if($_SESSION['admin'] == 1)
          echo '<li class="nav-item">
            <a class="nav-link menuColor" href="userList.php">User List</a>
          </li>';
          ?>
          <?php if($_SESSION['admin'] == 1)
          echo '<li class="nav-item">
            <a class="nav-link menuColor" href="feedbackList.php">Feedback List</a>
          </li>';
          ?>
        </ul>

      </div>
    </nav>

 <!-- Navigation menu ends -->
 


 <!-- Slider Image starts -->
  <div class="container">

    <div class="">
      <img src="image/innovative_idea.jpg" style="width:100%;height:300px;">
           
      
    </div>
  </div>
   <!-- Slider Image ends -->

    <!-- Clubs Image starts -->
    <br>
    <div class="container">
      <div class="row">
            <div class="col-md-4 column">
                <h5>Sports-Tennis Club</h5>
               
                <img src="image/tennis.jpeg" class="img-fluid imageSlide">
                
                <p>Tennis club for the students</p>
                
               
            </div>
            <div class="col-sm-4 col-md-4 column" style="margin-left: auto;margin-right: 0;">
              <h5>Learning-Coding Club</h5>
             
              <img src="image/programming_club.jpeg" class="img-fluid imageSlide">
              <p>Programming club </p>
              
             
          </div>
          <div class="col-sm-4 col-md-4 column" style="margin-left: auto;margin-right: 0;">
            <h5>Activity-Debate Club</h5>
          
            <img src="image/debate_club.jpeg" class="img-fluid imageSlide">
            <p>Debate club for the students</p>
            
          
        </div>
        </div>
    </div>

    <!-- Clubs Image ends -->


     <!-- Footer starts -->
    <div class="footer">
      <p>@Copyright After School Club 2023</p>
    </div>
    <!-- Footer ends -->
    
</body>
</html>
<?php 

}else{

     header("Location: login.php");

     exit();

}

 ?>