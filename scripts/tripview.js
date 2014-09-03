/*
* Trip View
*/

var map;
function initialize() {
  var mapOptions = {
    zoom: 18,
    center: new google.maps.LatLng(37.78313383212, -122.4039494991302)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var bounds = {
    17: [[20969, 20970], [50657, 50658]],
    18: [[41939, 41940], [101315, 101317]],
    19: [[83878, 83881], [202631, 202634]],
    20: [[167757, 167763], [405263, 405269]]
  };

}

google.maps.event.addDomListener(window, 'load', initialize);
