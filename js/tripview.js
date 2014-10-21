/*
* Javascript TripViewer which is used to display trip tags and 
* visualise trip data from a database.
*
* This script utilises the Google Maps Javascript V3 API.
* Documentation available at: https://developers.google.com/maps
*
* Author: HTMLTags
* Version: 1.2b
* Website: http://triptags.azurewebsites.net
*/

//Create database calls and collect required data
<?php
include_once('_php/_session.php');

?>

// Set the custom overlay object's prototype to a new instance
// of OverlayView. In effect, this will subclass the overlay class.
// Note that we set the prototype to an instance, rather than the
// parent class itself, because we do not wish to modify the parent class.

var map;
var geocoder;
var triptag = 1;

//Store trip tags in an array for easy access
var triptags = [];

ImageOverlay.prototype = new google.maps.OverlayView();



// Initialize the map and the custom overlays
function initialize() {
  var mapOptions = {
    //Set default centering location and zoom
    
    //TODO: Set zoom to be determined by images span
    zoom: 10,
    center: new google.maps.LatLng(62.303907, -150.109291),
   };

  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  
  geocoder = new google.maps.Geocoder();
  
  
  
  //Collect required images in a call to the database
  //TODO: Loop and DB call
  
  //Get static images in a loop
  var j;
  var links = [];
  var hiddenTripTags = document.getElementById("hiddenTripTags");
  
  for (j=1; j <= 8; j++) {
    links.push('img/featured1/' + j + '.jpg');
    
    //Add image trips
    var a = document.createElement('a');
    a.id = 'triptag' + j;
    a.href = 'img/featured1/' + j + '.jpg';
    a.setAttribute("data-lightbox", "trip-1");
    a.setAttribute("data-title", "My Trip Name!");
    hiddenTripTags.appendChild(a);
  }

  var sw;
  var ne;
  var bounds = [];
  
  //Images
  sw = new google.maps.LatLng(-32.8948358302915, 115.8457735197085);
  ne = new google.maps.LatLng(-31.8921378697085, 116.8484714802915);
  bounds.push(new google.maps.LatLngBounds(sw, ne));
  
  sw = new google.maps.LatLng(-26.137487, 130.378899);
  ne = new google.maps.LatLng(-25.133487, 131.381899);
  bounds.push(new google.maps.LatLngBounds(sw, ne));

  sw = new google.maps.LatLng(-26.320370, 133.982449);
  ne = new google.maps.LatLng(-25.316370, 134.985449);
  bounds.push(new google.maps.LatLngBounds(sw, ne));
  
  sw = new google.maps.LatLng(-32.944844, 144.924832);
  ne = new google.maps.LatLng(-31.944844, 145.924832);
  bounds.push(new google.maps.LatLngBounds(sw, ne));
  
  sw = new google.maps.LatLng(-34.8563188, 151.2158898);
  ne = new google.maps.LatLng(-33.8563188, 152.2158898);
  bounds.push(new google.maps.LatLngBounds(sw, ne));
  
  sw = new google.maps.LatLng(-34.056696, 152.109890);
  ne = new google.maps.LatLng(-33.056696, 153.109890);
  bounds.push(new google.maps.LatLngBounds(sw, ne));
  
  sw = new google.maps.LatLng(-28.481130, 153.296414);
  ne = new google.maps.LatLng(-27.481130, 154.296414);
  bounds.push(new google.maps.LatLngBounds(sw, ne));
  
  sw = new google.maps.LatLng(-22.996178, 149.648953);
  ne = new google.maps.LatLng(-21.996178, 150.648953);
  bounds.push(new google.maps.LatLngBounds(sw, ne));

  // Create object to contain the overlay image, the bounds of the image and a reference to the map
  for (j=0; j < 8; j++) {	
    triptags.push(new ImageOverlay(bounds[j], links[j], map));
  }
 
 
  /*
  *  Main Loop through triptag elements
  */
  
  //Also collect information about bounds of triptags
  tripBounds = new google.maps.LatLngBounds();
  
  //Add linear lines connecting adjacent trip locations
  var i;
  var prev = triptags[0];
  
  //Loop through triptags
  for (i in triptags) {
    //Set current triptag
    var cur = triptags[i];
    var bounds = cur.bounds_;
    var width = bounds.getSouthWest().lng() + bounds.getNorthEast().lng();
    
    //Extent boundary
    tripBounds.extend(bounds.getCenter());
    
    //Create marker for this location
    var marker = new google.maps.Marker({
      
      position: new google.maps.LatLng(bounds.getNorthEast().lat(), width/2),
      map: map,
      icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=' +
            (parseInt(i)+1) + '|ccffcc|000000'
    });
    
    //Create line between previous trip tag and current trip tag
    //Line will go start and end from the centers of each image
    var pline = new google.maps.Polyline({
      path:[prev.bounds_.getCenter(), bounds.getCenter()],
      strokeColor:"#FF0000",
      strokeOpacity:0.85,
      strokeWeight:5
    });
    
    //Set line to map
    pline.setMap(map);
    
    //Update prev  trip
    prev = cur;
  }
  
  //Ensure map fits tripBounds
  map.fitBounds(tripBounds);
}

/** @constructor 
*   Given the bounds and src of an image, initilise its values and set it to the map
*/
function ImageOverlay(bounds, image, map) {

  // Initialize all properties.
  this.bounds_ = bounds;
  this.image_ = image;
  this.map_ = map;

  // Define a property to hold the image's div. We'll
  // actually create this div upon receipt of the onAdd()
  // method so we'll leave it null for now.
  this.div_ = null;

  // Explicitly call setMap on this overlay.
  this.setMap(map);
}

/**
 * onAdd is called when the map's panes are ready and the overlay has been
 * added to the map.
 */
ImageOverlay.prototype.onAdd = function() {
  //Create parent div
  var div = document.createElement('div');
  div.style.borderStyle = 'none';
  div.style.borderWidth = '0px';
  div.style.position = 'absolute';

  //Create the img element and attach it to the div.
  var img = document.createElement('img');
  img.src = this.image_;
  img.style.width = '100%';
  img.style.height = '100%';
  img.style.border = '2px solid #000';
  img.style.position = 'absolute';
  div.appendChild(img);

  this.div_ = div;
  
  // Add the element to the "overlayImage" pane
  // So that it can recieve DOM elements
  var panes = this.getPanes();
  panes.overlayImage.appendChild(div);
  
  // set this as locally scoped var so event does not get confused
  var me = this;
  
  var tag = '#triptag' + triptag;
  
  //Attach a click listerner to this image, invoking lightbox onclick
  google.maps.event.addDomListener(div, 'dblclick', function() {
    $(tag).trigger('click');
});

  //Increment trip tag number
 ++triptag;
  
};

ImageOverlay.prototype.draw = function() {

  // We use the south-west and north-east
  // coordinates of the overlay to peg it to the correct position and size.
  // To do this, we need to retrieve the projection from the overlay.
  var overlayProjection = this.getProjection();

  // Retrieve the south-west and north-east coordinates of this overlay
  // in LatLngs and convert them to pixel coordinates.
  // We'll use these coordinates to resize the div.
  var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
  var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());

  // Resize the image's div to fit the indicated dimensions.
  var div = this.div_;
  div.style.left = sw.x + 'px';
  div.style.top = ne.y + 'px';
  div.style.width = (ne.x - sw.x) + 'px';
  div.style.height = (sw.y - ne.y) + 'px';
};

//Given a set of bounds, will update the bounds of an element and redraw it
ImageOverlay.prototype.updateBounds = function(bounds){
    this.bounds_ = bounds;
    this.draw();
};

// The onRemove() method will be called automatically from the API if
// we ever set the overlay's map property to 'null'.
ImageOverlay.prototype.onRemove = function() {
  this.div_.parentNode.removeChild(this.div_);
  this.div_ = null;
};

/*
function codeAddress(address, callback) {

geocoder.geocode( { 'address': address}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    callback(results[0].geometry.location);
  } else {
    alert("Geocode was not successful for the following reason: " + status);
  }
});

}
*/

google.maps.event.addDomListener(window, 'load', initialize);