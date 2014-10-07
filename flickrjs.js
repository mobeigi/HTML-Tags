var viewPageApp = angular.module('viewPageApp',[]); 

viewPageApp.controller('flickrController', function ($scope){
 //my API key for Flickr
    var apiKey = 'ff6ec1c7727b287de5281ad2c74ace9d';
    var album = '72157647658516722';
    var baseImages = [];
	var flickrURL = 'https://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key=' + apiKey + '&photoset_id=' + album + '&format=json&jsoncallback=?';
    $.getJSON(flickrURL, function(data){
        //loop through each picture in the set
        $.each(data.photoset.photo, function(i,item){
            //contruct a URL for each image
            var photoURL = 'https://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '.jpg';
            baseImages.push(photoURL); 
        });
    });
   
    //Function to display the correct number of photos
//    $scope.listImages = function () {
//        $scope.images = [];
//        $scope.images = baseImages.slice();
//        if($scope.numImages > baseImages.length){
//            alert("Sorry I dont have that many photos");
//            $scope.images.length = 0;
//        } else if($scope.numImages < 0 ){
//            alert("Please enter a value greater than 0");
//            $scope.images.length = 0;
//        } else if ($scope.numImages % 1 === 0) {
//            $scope.images.length = $scope.numImages;
//        }else {
//            alert("Please enter a whole number");
//            $scope.images.length = 0;
//        }
//    }
	
	
});
