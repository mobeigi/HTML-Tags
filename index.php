<!DOCTYPE html >
<html lang="en" ng-app="viewPageApp">
<head>
<title>TripTags</title>
<!-- include header -->
<?php include_once "/includes/header.php"; ?>

<script src="js/tripview.js"></script>
</head>

<body>
	<!-- include navbar -->
    <?php include_once "/includes/navbar.php"; ?>

    <?php
    if(isset($_GET['error'])) {
      $error = $_GET['error'];
      switch($error) {
        case 1:
            //Add some spacing
            for ($x = 0; $x < 2; $x++) {
                print '<br>';
              }
              //Print error message
              print '<p><b>Oops! You must be logged in to view this page!</b></p>';
              print '<p>You can log in through the menu bar in the top-right corner.</p>';
              //Add some spacing
              for ($x = 0; $x < 5; $x++) {
                print '<br>';
              }
          break;
          case 2:
          //Add some spacing
          for ($x = 0; $x < 2; $x++) {
              print '<br>';
            }
            //Print error message
            print '<p><b>Oops! Incorrect Username/Password</b></p>';
            print '<p>Please try to log in through the menu bar in the top-right corner again.</p>';
            //Add some spacing
            for ($x = 0; $x < 5; $x++) {
              print '<br>';
            }
          break;
    }
  }
    ?>

 <div class="jumbotron">
	  <div class="container">
			<div class="row">
				<div class="col-lg-2"></div>
				<!--              <div class="col-lg-10">-->
				<div class="col-lg-8">
                    			<div class="text-center">
				<br><br><br><h1>Welcome to TripTags</h1><br>
                <h3>Easily create and share cherished memories and journeys from around town or around the world</h3><br>
			</div>
					<!--
                    <input type="text" id="index_search" class="form-control text-center" placeholder="Where would you like to see?">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Explore!</button>
					</span>
                    -->
				 </div><!-- /input-group -->
				<div class="col-lg-2"></div>
				 <!--              </div> /.col-lg-6 -->
			</div><!-- /.row -->
	  </div>
 </div>
   <section id="featured-trips">
	  <div class="container">
            <!-- embedded featured public trip -->
            <div id="map-canvas"></div>
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
