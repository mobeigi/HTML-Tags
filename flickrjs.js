function flickrController($scope){
    //my API key for Flickr
    var apiKey = '9fe6d098f0ecd8855f5429ca8b9b4624';
    var album = '72157647658516722';
    var baseImages = [];

    $.getJSON('https://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key=' + apiKey + '&photoset_id=' + album + '&format=json&jsoncallback=?',
function(data){
        //loop through each picture in the set
        $.each(data.photoset.photo, function(i,item){
            //contruct a URL for each image
            var photoURL = 'https://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '.jpg';
            baseImages.push(photoURL);   
        });
    });
    
    //Function to display the correct number of photos
    $scope.listImages = function () {
        $scope.images = [];
        $scope.images = baseImages.slice();
		$scope.images.length = 3;
    }
}
