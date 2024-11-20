<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

<?php
        require('db.php');         
        // Taking all 5 values from the form data(input)
        $first_name =  filter_var($_REQUEST['firstName']);
        $last_name = filter_var($_REQUEST['lastName']);
        $user_name = filter_var($_REQUEST['userName']);
        $email = filter_var($_REQUEST['email']);
        $psw = filter_var($_REQUEST['psw']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          echo "<script>
          alert('$emailErr');
          window.location.href='createUser.php';
          </script>";
        } 
        else {

        $hash = password_hash($psw, PASSWORD_DEFAULT); 

        if (isset($_POST['active']))
        {
            $isActive = "1";
        } else {
            $isActive = "0";
        }

        if (isset($_POST['admin']))
        {
            $isAdmin = "1";
        } else {
            $isAdmin = "0";
        }

        // Duplicate User Check

        $checkUser = "SELECT * FROM users WHERE user_name = '$user_name';";

        $getData = mysqli_query($conn, $checkUser);

        $row = $getData->num_rows;

        if($row>0){
          $message = $user_name." already exists";
          echo "<script>
          alert('$message');
          window.location.href='createUser.php';
          </script>";
          
        } 
        else {         
          // Performing insert query execution
          // here our table name is college
          $sql = "INSERT INTO users (first_name, last_name, user_name, email, password, active, admin) VALUES ('$first_name', 
              '$last_name','$user_name','$email','$hash','$isActive', '$isAdmin');";
          
          if(mysqli_query($conn, $sql)){
            
          } else{
              echo "ERROR: Hush! Sorry $sql. "
                  . mysqli_error($conn);
          }
        }
      }
         
        // Close connection
        $conn -> close();
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
    <div class='container'>
    <br><br>
      <p> Record Created Successfully. <br><br>
            <a href='userList.php'> View Created Record </a>
      </p>
        
    </div>
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