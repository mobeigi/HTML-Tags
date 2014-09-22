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
            border: 2px solid #E4E4E4;
        }
        
        h2 {
            margin-top: 40px;
        }
        
        th {
            text-align: left;
        } 

        #tripdetails {
            width: 100%;
            line-height: 50px;
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
    <h2>Trip Details</h2> 
    <hr>
  
    <table id = "tripdetails">
    <tbody><tr>
    <td class="col1">
    <label>Trip Name:</label></td>
    <td class="col2">
    <input type="text" id="trip_name" placeholder="" class="form-control" style="
    display: inline-block;
    "></td>
    </tr>
    <tr>
    <td class="col1">
    <label>Trip comments:</label></td>
    <td class="col2">
    <textarea rows="5" class="form-control"></textarea> </td>
    </tr>
    <tr>
    <td class="col1">
    <label>Can be viewed by:</label></td>
    <td class="col2">
        <select class="form-control" style="width: 150px;">
        <option value="everyone">Everyone</option>
        <option value="friends" selected="selected" >Friends</option>
        <option value="onlyme">Only Me</option>
        </select>
    </tr>
    </tbody>
    </table>
        
    <!-- Create Image Groups -->
    <h2 style="display:inline-flex">Image Groups</h2>
    <button style="float:right;margin-top:45px;"type="push" class="btn btn-default">Import Image Group</button>
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
    <h2>Cover Photo</h2>
    <hr>

        <div class="row" align="center" style="margin-bottom: 12px;">
            <button type="push" class="btn btn-default">Select an image</button>
            <button type="push" class="btn btn-default">Upload an image</button>
        </div> 
            <a href="#" class="thumbnail" style="width: 160px; margin: 0 auto;margin-bottom: 15px;">
                <img src="./img/create_image_group_icon.png">
            </a>

    <!-- Finalisation buttons -->
    <div class="row" align="right" style="margin-bottom: 12px;">
        <button type="push" class="btn">Cancel</button>
        <button type="push" class="btn btn-success">Save Trip</button>
        <button type="push" class="btn btn-success">Preview Trip</button>
    </div>  
    
</div>

</body>

</html>

