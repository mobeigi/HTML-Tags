
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
			<br>
			<h1 class="text-left">Featured Trips:</h1>
            <br>
         <div class="row">
            <div class="col-lg-4 text-center"> <img src="img/homepage_featured/canada.jpg"><p>Calm and comforting Canada</p></div>
            <div class="col-lg-4 text-center"> <img src="img/homepage_featured/japan.jpg"><p>Journeying through joyous Japan</p> </div>
            <div class="col-lg-4 text-center"><img src="img/homepage_featured/england.jpg">Exlporing the wonders of elderly England </div>
		 </div>
<!--   attempt at using flickr to pull in photos-->
		  <div ng-controller="flickrController">
<!--
				  <form ng-submit="listImages()">
					  <input type="text" style="text-align:center; color:black" placeholder="0" ng-model="numImages"> 
					  <br><br>
					  <button type="submit" class="page-scroll btn btn-xl">Show Me</button>
					  <br><br><br><br>
				  </form>
-->
				  <div class="row">
					  <div class="col-md-6 col-sm-6 portfolio-item" ng-repeat="image in images">
						  <center><img src="{{image}}"></center>
						  <br>
					  </div>
				  </div>   
		   </div>
		</div>
   </section>
   
    <br>
   <footer>
	  <p><center>&copy; TripTags 2014</center></p>
   </footer>   

 <!--       scripts              -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-resource.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
   	<script src="js/bootstrap.min.js"></script>
<!--    tripview script -->
    <script src="maps/tripview.js"></script>
<!--  flickr script     -->
  	<script type="text/javascript" src="flickrjs.js"></script>
   </body>
</html>
