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
        .header {
        position: sticky;
        left: 0;
        top: 0;
        padding-top: 10px;
        padding-bottom: 10px;
        width: 100%;
        background-color:#a42744;
        color: white;
        text-align: center;
      }
      </style>

</head>
<body>

    <!-- Get Help from  w3school and bootstrap documentation-->
    <!-- Login form starts -->


    <div class="header">
    
        <img src="image/C.png" class="img-responsive" width="70" height="70">             
        <h3>After School Club</h3>
    </div>

    <form action="validate.php"  method="post">
        <div class="container" style="padding-top:100px;">
            <br>
          <h1>Please Sign in</h1>
          
          <hr>
          <label for="email"><b>Username</b></label><br>
          <div class="textbox">
          <i class="fa fa-user" aria-hidden="true"></i>
          <input type="text" placeholder="Enter username" name="username" ><br>
          </div>
      

          <label for="password"><b>Password</b></label><br>
          <div class="textbox">
          <i class="fa fa-lock" aria-hidden="true"></i>
          <input type="password" placeholder="Enter Password" name="password" ><br>
          </div>
      
          
          
          <div class="clearfix">
            
            <button type="submit" class="logIn">Sign In</button>
            <!-- <button type="button" class="cancelbtn">Cancel</button> -->
          </div>
        </div>
    </form>
        <!-- Login form ends -->
    <div class="footer">
        <p class="text-center">@Copyright After School Club 2023</p>
    </div>
   
</body>
</html>
