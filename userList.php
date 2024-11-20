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

    <div class="container">

    <div class="">
      <br>
    <a class="" href="createUser.php">Create User</a>
<?php
require('db.php');   

$query = "SELECT * FROM users ORDER BY id";

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">SL</font> </td>          
          <td> <font face="Arial">First Name</font> </td> 
          <td> <font face="Arial">Last Name</font> </td> 
          <td> <font face="Arial">Username</font> </td> 
          <td> <font face="Arial">Email</font> </td> 
          <td> <font face="Arial">Admin</font> </td>           
          <td> <font face="Arial">Active</font> </td>
          <td> <font face="Arial">Edit</font> </td> 
          <td> <font face="Arial">Delete</font> </td>  
      </tr>';

if ($result = $conn->query($query)) {
    $counter = 0;
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["first_name"];
        $field3name = $row["last_name"];
        $field4name = $row["user_name"];
        $field5name = $row["email"]; 
        $field6name = $row["admin"]; 
        $field7name = $row["active"]; 

        if($field6name==1){
          $field6name = "Yes";
        } else{
          $field6name = "No";
        }
        if($field7name==1){
          $field7name = "Yes";
        } else{
          $field7name = "No";
        }
        echo '<tr> 
                  <td>'.++$counter.'</td>                  
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td>
                  <td>'.$field6name.'</td>  
                  <td>'.$field7name.'</td>  
                  <td align="center"><a href="editUser.php?id='.$field1name.'">Edit</a></td>
                  <td align="center"><a onclick="return checkDelete()" href="deleteUser.php?id='.$field1name.'">Delete</a></td>
              </tr>';
    }
    $result->free();
} 

$conn -> close();
?>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
    </div>
    </div>
    <br>   
    <div class="footer">
        <p class="text-center">@Copyright After School Club 2023</p>
    </div>
</body>
</html>
<?php 
}
else
{
     header("Location: login.php");
     exit();
}
?>