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

    <!-- Get Help from  w3school and bootstrap documentation-->
    <style>
      
      /* Full-width input fields */
        input[type=text], input[type=password] {
          width: 70%;
          padding: 10px;
          margin: 5px 0 22px 0;
          display: inline-block;
          border: none;
          background: #f1f1f1;
        }
        
        input[type=text]:focus, input[type=password]:focus {
          background-color: #ddd;
          outline: none;
        }
        
        hr {
          border: 1px solid #f1f1f1;
          margin-bottom: 25px;
        }
        
        /* Set a style for all buttons */
        button {
          background-color: #a42744;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          /* width: 100%; */
          opacity: 0.9;
        }
        
        button:hover {
          opacity:1;
        }
        
    
        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
          float: left;
          width: 10%;
        }
      </style>

</head>
<body>

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

   <!-- navigation menu starts -->
   <!-- Get Help from the Week 2 lab -->
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
    <!-- navigation menu ends -->

    <!-- Get Help from  w3school and bootstrap documentation-->
    <!-- Sign up page starts -->
    <form action="insertUser.php" style="border:1px solid #ccc" method="post">
        <div class="container">
            <br>
          <h1>Create a User</h1>
          <p>Please fill in this form to create a user.</p>
          <hr>

          <label for="email"><b>First Name</b></label><br>
          <input type="text" placeholder="First Name" name="firstName" id="firstName" required><br>

          <label for="email"><b>Last Name</b></label><br>
          <input type="text" placeholder="Last Name" name="lastName" id="lastName" required><br>
      
          <label for="email"><b>Email</b></label><br>
          <input type="text" placeholder="Enter Email" name="email" id="email" required><br>

          <label for="email"><b>User Name</b></label><br>
          <input type="text" placeholder="Enter Email" name="userName" id="userName" required><br>
      
          <label for="psw"><b>Password</b></label><br>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required><br>
      
          <!-- <label for="psw-repeat"><b>Repeat Password</b></label><br>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" required><br> -->
          
          <label style="padding-right: 50px">
            <input type="checkbox" value="1" checked="checked" name="admin" id="admin" style="margin-bottom:15px"> Is Admin
          </label>

          <label>
            <input type="checkbox" value="1" checked="checked" name="active" id="active" style="margin-bottom:15px"> Is Active
          </label>
                    
          <div class="clearfix">
            
            <button type="submit" class="btn-success">Create</button>
            <br>
            <!-- <button type="button" class="cancelbtn">Cancel</button> -->
          </div>
        </div>
      </form>
    <!-- Sign up page ends -->

    <br>
    
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