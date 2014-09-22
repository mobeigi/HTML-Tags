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


// Set the custom overlay object's prototype to a new instance
// of OverlayView. In effect, this will subclass the overlay class.
// Note that we set the prototype to an instance, rather than the
// parent class itself, because we do not wish to modify the parent class.

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

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  
  //Collect required images in a call to the database
  //TODO: Loop and DB call
  
  //Get static images in a loop
  var j;
  var links[];
  for (j=1; j <= 8; j++) {
    links.push('featured1/' + j + '.jpg');
  }
  
  console.log(codeAddress("sydney opera house"));
  

  //Image 1
  var swBound = new google.maps.LatLng(62.303907, -150.159291);
  var neBound = new google.maps.LatLng(62.323907, -150.109291);
  var bounds = new google.maps.LatLngBounds(swBound, neBound);

  // Collects links to be displayed on the map
  var srcImage = 'featured1/1.jpg';
  
  //Image 2
  var swBound2 = new google.maps.LatLng(62.343907, -150.169291);
  var neBound2 = new google.maps.LatLng(62.363907, -150.119291);
  var bounds2 = new google.maps.LatLngBounds(swBound2, neBound2);

  // Collects links to be displayed on the map
  var srcImage2 = 'http://images.techtimes.com/data/images/full/4061/bill-gates-wealthiest-person.jpg?w=600';
  
  //Image 3
  var swBound3 = new google.maps.LatLng(62.343907, -149.969291);
  var neBound3 = new google.maps.LatLng(62.363907, -149.909291);
  var bounds3 = new google.maps.LatLngBounds(swBound3, neBound3);

  // Collects links to be displayed on the map
  var srcImage3 = 'http://thinkoskar.com/wp-content/uploads/2012/08/Teemo-Time.jpg';

  
  
  // Create object to contain the overlay image, the bounds of the image and a reference to the map
  triptags.push(new ImageOverlay(bounds, srcImage, map));
  triptags.push(new ImageOverlay(bounds2, srcImage2, map));
  triptags.push(new ImageOverlay(bounds3, srcImage3, map));
 
 /*
 
  var markerA = new google.maps.Marker({
  
    			position: new google.maps.LatLng( swBound.lat(), ((swBound.lng() + neBound.lng())/2)),
    			map: map, 
                title:"Kappa toop tip"
    		});
    
 */


 http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=1|FFDB58|000000
 
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
  
  //Attach a click listerner to this image, invoking lightbox onclick
  google.maps.event.addDomListener(div, 'dblclick', function() {
    window.location="http://www.google.com";
});
  
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



geocoder = new google.maps.Geocoder();
function codeAddress(address) {
geocoder.geocode( { 'address': address}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    //In this case it creates a marker, but you can get the lat and lng from the location.LatLng
    
    return results[0].geometry.location.LatLng();
  } else {
    alert("Geocode was not successful for the following reason: " + status);
  }
});
}

google.maps.event.addDomListener(window, 'load', initialize);