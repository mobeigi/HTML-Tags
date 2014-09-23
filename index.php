
    <!DOCTYPE html >
<html lang="en" ng-app="viewPageApp">
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
    
    <!-- load tripviewer -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="maps/tripview.js"></script>

    <!-- lightbox -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="maps/imagegroupview.js"></script>
    <link href="css/lightbox.css" rel="stylesheet" />

</head>

<body>
	<!-- include navbar -->
    <?php include_once "/includes/navbar.php"; ?>
    
 <div class="jumbotron">
	  <div class="container">
			<div class="text-center">
				<br><br><br><h1>Welcome to TripTags</h1><br>
			</div>
			<div class="row">
				<div class="col-lg-2"></div>
				<!--              <div class="col-lg-10">-->
				<div class="col-lg-8 input-group">
					<input type="text" class="form-control text-center" placeholder="Where would you like to see?">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Go!</button>
					</span>
				 </div><!-- /input-group -->
				<div class="col-lg-2"></div>
				 <!--              </div> /.col-lg-6 -->
			</div><!-- /.row -->
	  </div>
 </div>
   <section id="featured-trips">
	  <div class="container">
            <!-- embedded featured public trip -->
            <div id="map-canvas" style="width: 960px;height: 520px;margin: 0 auto;"></div>
			<!-- hidden link block -->
            <div id="hiddenTripTags" style="visibility:hidden;"></div>
            
            <br>
			<h1 class="text-left">Featured Trips:</h1>
            <br>
          <div class="row">
            <div class="col-lg-4 text-center"> <img src="img/homepage_featured/canada.jpg"><p>Calm and comforting Canada</p></div>
            <div class="col-lg-4 text-center"> <img src="img/homepage_featured/japan.jpg"><p>Journeying through joyous Japan</p> </div>
            <div class="col-lg-4 text-center"><img src="img/homepage_featured/england.jpg">Exlporing the wonders of elderly England </div>

          </div>


<!--   attempt at using flickr to pull in photos
		 <div ng-controller="flickrController">
            <div class="col-md-6" ng-repeat="image in images">
          
                <center><img src="{{image}}"></center>
             
                <br>
            </div>
			<form ng-submit="listImages()">
                <input type="text" style="text-align:center; color:black" placeholder="0" ng-model="numImages"> 
                <br><br>
                <button type="submit" class="page-scroll btn btn-xl">Show Me</button>
                <br><br><br><br>
            </form>
		  </div>
-->
		</div>
   </section>
    <br>
   <footer>
	  <p><center>&copy; TripTags 2014</center></p>
   </footer>
</body>
</html>
