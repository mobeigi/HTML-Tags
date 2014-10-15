
<!DOCTYPE html >
<html lang="en" ng-app>
  <head>
        <title>TripTags</title>
        
        <?php include_once("includes/header.php"); ?>
       
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

  </head>
    
    <body>
      <!-- insert navbar -->
      <?php $tripViewer = true; ?>
      <?php include_once("includes/navbar.php"); ?>

		 <section id="main_body" class="bg-light-gray">
			<div id="map-canvas"></div>
            <!-- hidden link block -->
            <div id="hiddenTripTags" style="visibility:hidden;"></div>
    	</section>
    
        
    <!-- Share link modal window -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Trip Link</h4>
          </div>
          <div class="modal-body">
              <p>Give the following link to your friends:</p>
              <input type="text" id="trip_name" value="http://triptags.azurewebsites.net/view_page.php?trip=19292" style="width: 100%; padding: 5px" readonly>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
            
</html>