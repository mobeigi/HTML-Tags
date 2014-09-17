/*
* Trip View
*/

// Set the custom overlay object's prototype to a new instance
// of OverlayView. In effect, this will subclass the overlay class.
// Note that we set the prototype to an instance, rather than the
// parent class itself, because we do not wish to modify the parent class.

var overlay;
var overlay2;
ImageOverlay.prototype = new google.maps.OverlayView();

// Initialize the map and the custom overlay.

function initialize() {
  var mapOptions = {
    zoom: 10,
    center: new google.maps.LatLng(62.303907, -150.109291),
   };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  //Image 1
  var swBound = new google.maps.LatLng(62.303907, -150.159291);
  var neBound = new google.maps.LatLng(62.323907, -150.109291);
  var bounds = new google.maps.LatLngBounds(swBound, neBound);

  // Collects links to be displayed on the map
  var srcImage = 'http://images.techtimes.com/data/images/full/4061/bill-gates-wealthiest-person.jpg?w=600';
  
  //Image 2
  var swBound2 = new google.maps.LatLng(62.323907, -150.289291);
  var neBound2 = new google.maps.LatLng(62.34907, -150.119291);
  var bounds2 = new google.maps.LatLngBounds(swBound2, neBound2);

  // Collects links to be displayed on the map
  var srcImage2 = 'http://upload.wikimedia.org/wikipedia/commons/7/77/Deepsea.JPG';

  // Create object to contain the overlay image, the bounds of the image and a reference to the map
  overlay = new ImageOverlay(bounds, srcImage, map);
  overlay2 = new ImageOverlay(bounds2, srcImage2, map);
  
  //Add lines
  var myTrip=[bounds,bounds2];
  var flightPath=new google.maps.Polyline({
  path:myTrip,
  strokeColor:"#FF0000",
  strokeOpacity:0.8,
  strokeWeight:2
  });

flightPath.setMap(map);
}

/** @constructor */
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

  var div = document.createElement('div');
  div.style.borderStyle = 'none';
  div.style.borderWidth = '0px';
  div.style.position = 'absolute';

  // Create the img element and attach it to the div.
  var img = document.createElement('img');
  img.src = this.image_;
  img.style.width = '80px';
  img.style.height = '80px';
  img.style.border = '2px solid #000';
  img.style.position = 'absolute';
  div.appendChild(img);

  this.div_ = div;
  
  // Add the element to the "overlayLayer" pane.
  var panes = this.getPanes();
  panes.overlayLayer.appendChild(div);
  
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

// The onRemove() method will be called automatically from the API if
// we ever set the overlay's map property to 'null'.
ImageOverlay.prototype.onRemove = function() {
  this.div_.parentNode.removeChild(this.div_);
  this.div_ = null;
};

google.maps.event.addDomListener(window, 'load', initialize);