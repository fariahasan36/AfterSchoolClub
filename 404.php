<?php
// $error = $_SERVER["REDIRECT_STATUS"];
// $error_title = '';
// $error_message = '';
// if($error == 404){
    $error_title = '404 Page Not Found';
    $error_message = 'The document/file requested was not found on this server';
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

    <div class="jumbotron text-center" style="margin-bottom: 0;">
        <h1><?php echo $error_title; ?></h1>
        <h5><?php echo $error_message; ?></h5>
    </div>
    
</body>
</html>