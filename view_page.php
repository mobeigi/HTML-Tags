
<!DOCTYPE html >
<html lang="en" ng-app>
  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>TripTags</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--      bootstrap css-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
<!--      custom css -->
        <link rel="stylesheet" href="css/main.css">
<!--    fonts       -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        
     <style>
      #map-canvas {
      position: absolute;
      top: 50px;
      bottom: 0;
      margin: 0px;
      padding: 0px;
      width: 100%;
      }
    </style>
        
    <!-- load tripviewer -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="maps/tripview.js"></script>
  </head>
    
    <body>
      <!-- insert navbar -->
      <?php $tripViewer = true; ?>
      <?php include_once("includes/navbar.php"); ?>

		 <section id="main_body" class="bg-light-gray">
			<div id="map-canvas"></div>
    	</section>
    
    <!--       scripts              -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-resource.js"></script>
        <script type="text/javascript" src="flickrjs.js"></script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
