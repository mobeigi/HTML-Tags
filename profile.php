<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>User Profile</title>

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
        
        textarea {
            resize: none;
        }
        
        hr {
            -moz-border-bottom-colors: none;
            -moz-border-image: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            border: 2px solid #E4E4E4;
        }
        
        h1 {
            text-align: left;
        }
        
        h3 {
            margin-top: 20px;
        }
        
        th {
            text-align: left;
        } 

    </style>

</head>

<body>
    
    
    <!-- Import the bootstrap files -->
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
<div class="container">

    
   <!-- include navbar -->
   <?php include_once "/includes/navbar.php"; 
    
    
    <!-- Welcome message -->
    <!-- retrieve the name --> 
    <h1>Welcome, name!</h1>
    <hr>

    
    <h3 style="display:inline-flex">My Trips:</h3>
    <a href="http://triptags.azurewebsites.net/new_create_trip.php">
    <button style="float:right;margin-top:25px;"type="push" class="btn btn-default">Create New Trip</button>
    </a>
    <div class="row">
        <div class="col-md-3 col-md-2">
            <a href="#" class="thumbnail">
                <img src="./img/create_image_group_icon.png">
            </a>
        </div>            
        <div class="col-md-3 col-md-2">
            <a href="#" class="thumbnail">
                <img src="./img/create_image_group_icon.png">
            </a>
        </div>            
        <div class="col-md-3 col-md-2">
            <a href="#" class="thumbnail">
                <img src="./img/create_image_group_icon.png">
            </a>
        </div>              
        <div class="col-md-3 col-md-2">
            <a href="#" class="thumbnail">
                <img src="./img/create_image_group_icon.png">
            </a>
        </div>            
    </div>
        
    
    <!-- Select Cover photo for the trip -->
    <h2>Recently Viewed Trips</h2>
    <hr>
    
    <div class="row">
        <div class="col-md-3 col-md-2">
            <a href="#" class="thumbnail">
                <img src="./img/create_image_group_icon.png">
            </a>
        </div>            
        <div class="col-md-3 col-md-2">
            <a href="#" class="thumbnail">
                <img src="./img/create_image_group_icon.png">
            </a>
        </div>            
        <div class="col-md-3 col-md-2">
            <a href="#" class="thumbnail">
                <img src="./img/create_image_group_icon.png">
            </a>
        </div>              
        <div class="col-md-3 col-md-2">
            <a href="#" class="thumbnail">
                <img src="./img/create_image_group_icon.png">
            </a>
        </div>            
    </div>

    
</div>

</body>

</html>

