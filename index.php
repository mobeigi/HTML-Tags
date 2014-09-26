<!DOCTYPE html >
<html lang="en" ng-app="viewPageApp">
<head>
<title>TripTags</title>
<!-- include header -->
<?php include_once "/includes/header.php"; ?>
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
            <div class="col-lg-4 text-center"><img src="img/homepage_featured/england.jpg">Exploring the wonders of elderly England </div>

          </div>

		</div>
</section>
    <br>
    
    <!-- include footer -->
    <?php include_once "/includes/footer.php"; ?>
    
</body>
</html>
