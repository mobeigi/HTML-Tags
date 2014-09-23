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

 <!-- lightbox -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="js/lightbox.min.js"></script>

 <link href="css/lightbox.css" rel="stylesheet" />
 
 
 <!-- Lightbox modal viewer control script --> 
 <script>
 //Sets main image to provided image url
 function setMainImage(obj) {
    var img = document.getElementById("lbc-image");
    img.src = obj.src;
 }
 
 //Load side panel pictures
 function loadSidePanel() {
    /* Load 4 images into side panel */
    var i;
    var sideDiv = document.getElementById("lbc-sidepanel");
    sideDiv.innerHTML = "<h4>Group images:</h4>";
    
    var firstImg = document.createElement("img");
    firstImg.src = document.getElementById("lbc-image").src;
    firstImg.onclick = function() { setMainImage(firstImg); };
    sideDiv.appendChild(firstImg);
    
    for (i = 1; i < 4; ++i) {
        var img = document.createElement("img");
        img.src = "img/placeholder.png";
        img.onclick = function() { setMainImage(img); };
        sideDiv.appendChild(img);
    }
 }
 
 //Load title for image group
 function loadTitle(title) {
    if (typeof title === 'undefined') {
        title = "";
    }
    
    //Get bottom panel box
    var titleDiv = document.getElementById("lbc-title");
    
    //First childnode is h2 element
    titleDiv.childNodes[0].innerHTML = title;
 }
 
 //Load description box
 function loadDescription(description) {
     if (typeof description === 'undefined') {
        description = "";
    }
    
    //Get bottom panel box
    var botPanel = document.getElementById("lbc-bottompanel-box");
    botPanel.innerHTML = '<div id="description"><p>' + description + '</p></div>';
 }
 
  //Load comments box with static comment for n ow
 function loadComments(commentText) {
    if (typeof commentText === 'undefined') {
        commentText = "";
    }
    
    var botPanel = document.getElementById("lbc-bottompanel-box");
    if (commentText == "") {
        botPanel.innerHTML = '<div id="comments"><p style="margin-left:0px">There are no comments yet. Why not leave one?</p><br /><textarea id="text-input" rows="1"></textarea><button onclick="loadComments(document.getElementById(\'text-input\').value);">Submit</button></div>';
    }
    else {
        botPanel.innerHTML = '<div id="comments"><img src="img/noprofilepic.png" /><p>' + commentText + '</p><br /><textarea id="text-input" rows="1"></textarea><button onclick="loadComments(document.getElementById(\'text-input\').value);">Submit</button></div>';
    }
 }

 </script> 
 
 </head>

<body>
<a href="img/featured1/1.jpg" data-lightbox="image-1" data-title="Trip tag 3">Image #1</a>
<a href="img/featured1/2.jpg" data-lightbox="image-1" data-title="Trip tag 4">Image #1</a>
<a href="img/featured1/3.jpg" data-lightbox="image-1" data-title="Trip tag 4">Image #1</a>
<a href="img/featured1/4.jpg" data-lightbox="image-1" data-title="Trip tag 4">Image #1</a>
<a href="img/featured1/5.jpg" data-lightbox="image-1" data-title="Trip tag 4">Image #1</a>
<a href="img/featured1/6.jpg" data-lightbox="image-1" data-title="Trip tag 4">Image #1</a>
<a href="img/featured1/7.jpg" data-lightbox="image-1" data-title="Trip tag 4">Image #1</a>
<a href="img/featured1/8.jpg" data-lightbox="image-1" data-title="Trip tag 4">Image #1</a>
</body>

</html>