<script type="text/javascript">
//Using DB variables, store required information in JS arrays
var image_group_names = [];
var image_group_desc = [];

<?php
  for ($j; $j < $numImageGroups; ++$j) {
  ?>
  image_group_names.push(<?php echo $name[$j]; ?>);
  image_group_desc.push(<?php echo $description[$j]; ?>);
  <?php
  }
?>

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
    sideDiv.innerHTML = "<h4>Group images:</h4><div id=\"lbc-image-scroll\" class=\"scroll\"></div>";
    
    sideDiv = document.getElementById("lbc-image-scroll");
    
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
    
    /*
    <div class="scroll">
    <img src="http://triptags.azurewebsites.net/uploads/8ccaa4a2320836ed9fb5465418ce19e4.jpg">
    <img src="http://triptags.azurewebsites.net/uploads/8ccaa4a2320836ed9fb5465418ce19e4.jpg">
    <img src="http://triptags.azurewebsites.net/uploads/8ccaa4a2320836ed9fb5465418ce19e4.jpg">
    <img src="http://triptags.azurewebsites.net/uploads/8ccaa4a2320836ed9fb5465418ce19e4.jpg">
    <img src="http://triptags.azurewebsites.net/uploads/8ccaa4a2320836ed9fb5465418ce19e4.jpg"> 
    <img src="http://triptags.azurewebsites.net/uploads/8ccaa4a2320836ed9fb5465418ce19e4.jpg">
    <img src="http://triptags.azurewebsites.net/uploads/8ccaa4a2320836ed9fb5465418ce19e4.jpg">
    <img src="http://triptags.azurewebsites.net/uploads/8ccaa4a2320836ed9fb5465418ce19e4.jpg">
    </div>
    */
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