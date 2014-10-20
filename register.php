<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>Register</title>
    
    <!-- include header -->
    <?php include_once "/includes/header.php"; ?>
    </head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/main.css">
<!--    font to be used for the web page (Open Sans)-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style>
        
        body {
            padding-top: 50px;
            padding-bottom: 20px;
            padding-right: 20px;
        }
        
        
    </style>

</head>

<body>
    
    
    <!-- Import the bootstrap files -->
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
<div class="container"> 
    <!-- include navbar -->
    <?php include_once "/includes/navbar.php"; ?>
    
    <!-- Heading -->
    <h2>Register</h2>
    <hr>
    
<form role="form" action="_php/_register.php" method="post">
    <div class="form-group">
        <label for="userEmail">Email address</label>
        <input type="email" name="userEmail" class="form-control" id="userEmail" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="userPassword">Password</label>
        <input type="password" name="userPassword" class="form-control" id="userPassword" placeholder="Password">
    </div>

    <div class="row" align="right" style="margin-bottom: 12px;">
        <button type="submit" name="cancel" class="btn btn-default">Cancel</button>
        <button type="submit" name="register" class="btn btn-success">Register</button>
    </div>
</form>
        
</div>

</body>

</html>

