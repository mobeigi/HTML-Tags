<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>Create Trip</title>

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
            border-color: #000000 -moz-use-text-color #FFFFFF;
            border-style: solid none;
            border-width: 5px 0;
            margin: 18px 0;
        }
        
        th {
            text-align: left;
        } 

        #tripdetails td.col1 {
            width: 15%;
            vertical-align: top;
        }
        
        #tripdetails td.col2 {
            width: 85%;
        }
        
    </style>

</head>

<body>
    
    
    <!-- Import the bootstrap files -->
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
<div class="container">
    
   <!-- include navbar -->
   <?php $loggedIn = true; ?>
   <?php include_once "/includes/navbar.php"; ?>
    
    <!-- User input for the trip details -->
    <hr>
    <h2>Trip Details</h2> 
    <hr>
  
    <table id = "tripdetails" style="width:100%">
    <tbody><tr>
    <td class="col1">
    <label>Trip Name:</label></td>
    <td class="col2">
    <input type="text" id="trip_name" placeholder="" class="form-control" style="
    display: inline-block;
    "></td>
    </tr><br>

    <tr>
    <td class="col1">
    <label>Trip comments:</label></td>
    <td class="col2">
    <textarea rows="5" class="form-control"></textarea> </td>
    </tr>
        
        
        <label>Can be viewed by:</label>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                Friends
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Everyone</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Friends</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Only me</a></li>
            </ul>
        </div>
        
    
    <!-- Create Image Groups -->
    <hr>
    <h2>Image Groups</h2><button type="push" class="btn btn-default">Import Image Group</button>
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
        
    
    <!-- Select Cover photo for the trip -->
    <hr>
    <h2>Cover Photo</h2>
    <hr>

        <div class="row" align="center">
            <button type="push" class="btn btn-default">Select an image</button>
            <button type="push" class="btn btn-default">Upload an image</button>
        </div>  
            <a href="#" class="thumbnail">
                <img src="./img/create_image_group_icon.png">
            </a>

    <!-- Finalisation buttons -->
    <div class="row" align="right">
        <button type="push" class="btn">Cancel</button>
        <button type="push" class="btn btn-success">Save Trip</button>
        <button type="push" class="btn btn-success">Preview Trip</button>
    </div>  
    
</div>

</body>

</html>

