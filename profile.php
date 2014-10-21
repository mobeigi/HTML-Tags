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
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- include navbar -->
                <?php include_once "/includes/navbar.php"; ?>

                <!-- Redirect user if they're not logged in -->
                <?php if (!isset($_SESSION['user_id'])) {
                    //Add some spacing
                    for ($x = 0; $x < 2; $x++) {
                        print '<br>';
                    }

                    //Print error message
                    print '<p><b>Oops! You must be logged in to view this page!</b></p>';
                    print '<p>You can log in through the menu bar in the top-right corner.</p>';
                    print '<a href="http://triptags.azurewebsites.net">Return to home page</a>';

                    //Add some spacing
                    for ($x = 0; $x < 5; $x++) {
                        print '<br>';
                    }

                } else {?>

                <!-- Welcome message, retrieve email address -->
                <?php
                    $userEmail = $_SESSION['user_email'];
                    print "<h1>Welcome, $userEmail!</h1>\n";
                ?>

                <h2 style="display:inline-flex">My Trips</h2>
                    <a href="http://triptags.azurewebsites.net/create_trip.php">
                        <button style="float:right;margin-top:25px;"type="push" class="btn btn-default">Create New Trip</button>
                    </a> <hr>

                <div class="row">

                  <!---
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="/img/create_image_group.jpg">
                        </a>
                    </div>
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="./img/create_image_group.jpg">
                        </a>
                    </div>
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="./img/create_image_group.jpg">
                        </a>
                    </div>
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="./img/create_image_group.jpg">
                        </a>
                    </div>
                  -->



                  <?php
                  if(isset($_SESSION['user_id'])) {
                    $query = 'select trip_id, name, cover_image from trips where owner_id = $1';
                    $result = $pg->_pg_query($query, $_SESSION['user_id']);
                    $rows = pg_fetch_all($result);
                    $row_size = sizeof($rows);

                    for($i = 0; $i != $row_size; $i++) {
                        print "<div class='col-md-3 col-md-2' style='width:210px;'>";
                        print "<a style='width:200px;' class='thumbnail' href='view_trip.php?trip=";
                        print $rows[$i]['trip_id'];
			                    print "'>";
                        if(!empty($rows[$i]['cover_image'])) {
				                     print "<img src=./uploads/";
                             print $rows[$i]['cover_image'];
                            print ">";
                        } else {
                            	print "<img src=\"./img/create_trip.jpg\">";
                        }
                        print "<p>$rows[$i]['name']</p>";
                        		                       print "</a></div>";
                    }
                  } else {
                    print '
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="/img/create_image_group.jpg">
                        </a>
                    </div>
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="./img/create_image_group.jpg">
                        </a>
                    </div>
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="./img/create_image_group.jpg">
                        </a>
                    </div>
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="./img/create_image_group.jpg">
                        </a>
                    </div>
                    ';
                  }

                  ?>
                </div>


                <!-- Select Cover photo for the trip -->
                <h2>Recently Viewed Trips</h2>
                <hr>

                <div class="row">
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="./img/create_image_group.jpg">
                        </a>
                    </div>
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="./img/create_image_group.jpg">
                        </a>
                    </div>
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="./img/create_image_group.jpg">
                        </a>
                    </div>
                    <div class="col-md-3 col-md-2">
                        <a href="#" class="thumbnail">
                            <img src="./img/create_image_group.jpg">
                        </a>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <?php include_once "/includes/footer.php"; ?>
</body>
</html>
