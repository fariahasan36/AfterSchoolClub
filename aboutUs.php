<?php 

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
<!-- Header starts -->
<div class="container">
  <div class="row">
    
    <div class="col-md-6 col-sm-6">
        <div class="row">
          <!-- <div class="col-md-12 col-sm-12"> -->
            <div class="col-md-2 col-sm-6">
              <img src="image/C.png" class="img-responsive" width="70" height="70">
            </div>
        
            <div class="col-md-10 col-sm-6" style="padding-top: 16px;">
              <h3>After School Club</h3>
            </div>
          <!-- </div> -->
        </div>
          
    </div>
    <div class="col-md-6 col-sm-6" id="addLogin" style="text-align: right;">
         <a href="logout.php" ><?php echo $_SESSION['user_name']; ?> logout</a>
      </div>
  </div>
</div>
<!-- Header ends -->
  
<!-- Navigation Menu starts -->
<!-- Get help from lab week 2 -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #a42744;color: white">
    
    <div class="" id="navbarSupportedContent">
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
<!-- Navigation Menu ends -->
  <div class="container">

    <br><br><br>
<p> After school club runs straight from school until 6.30 pm every school day.</p>
  <br>

  <p>Our members of staff collect children from their classes and bring them together to club.
   We split the children by age with the younger children staying in the library area, 
   this enables us to provide a more age appropriate environment and so they can access the outside area safely.</p>
    <br>
    <p>It is just as important to us that you as parents feel happy and settled as soon as possible and
     it is great if the children see us chatting and having a friendly relationship as soon as possible.
      Please ask if there is anything we can do, and we will try and make ourselves available at pick-up
       time wherever possible.</p>

       <br>
       <p>A registration form must be completed for each new child before they can attend the after – school club.
         This will be sent when your child is offered a place.

        For further information or to register your child for September please email</p>
   <br><br><br>
  </div>
  <div class="footer">
    <p class="text-center">@Copyright After School Club 2023</p>
</div>

    
</body>
</html>
<?php 

}else{

     header("Location: login.php");

     exit();

}

?>