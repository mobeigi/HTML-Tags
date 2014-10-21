<script type="text/javascript">
// window.curImageNum is a global js helper which states which modal window is open
// Starting from 1

//Using DB variables, store required information in JS arrays
var image_group_names = [];
var image_group_desc = [];
var images = [[]]; //2D array

<?php
  for ($j = 0 ; $j < $numImageGroups; ++$j) {
  ?>
  image_group_names.push('<?php echo $name[$j]; ?>');
  image_group_desc.push('<?php echo $description[$j]; ?>');
  
    <?php
    //Iterate over adding images for this image group
    for ($k = 0; $k < sizeof($images[$j]); ++$k) {
      ?>
      if (!images[<?php echo $j; ?>]) 
        images[<?php echo $j; ?>] = []
        
      images[<?php echo $j; ?>][<?php echo $k; ?>] = '<?php echo $images[$j][$k]; ?>';
      <?php
    }
  }
?>

//Initial load
loadTitle();
loadDescription();
loadSidePanel();

//Sets main image to provided image url
 function setMainImage(url) {
    var img = document.getElementById("lbc-image");
    img.src = url;
    console.log(url);
}
 
 //Load side panel pictures
 function loadSidePanel() {
    window.setTimeout(loadSidePanelB, 500);
 }
 
 function loadSidePanelB() {

    /* Load 4 images into side panel */
    var i;
    var sideDiv = document.getElementById("lbc-sidepanel");
    sideDiv.innerHTML = "<h4>Group images:</h4><div id=\"lbc-image-scroll\" class=\"scroll\"></div>";
    sideDiv = document.getElementById("lbc-image-scroll");

    var imageLength = images[window.curImageNum - 1].length;
    
    for (i = 0; i < imageLength; ++i) {
        var img = document.createElement("img");
        img.src = 'uploads/' + images[window.curImageNum - 1][i];
        img.onclick = function() { setMainImage(img.src); };
        sideDiv.appendChild(img);
    }
 }
 
 //Load title for image group
function loadTitle() {
    window.setTimeout(loadTitleB, 100);
}

function loadTitleB() {
    //Get bottom panel box
    var titleDiv = document.getElementById("lbc-title");
    
    //First childnode is h2 element
    titleDiv.childNodes[0].innerHTML = image_group_names[window.curImageNum - 1];
 }
 
 //Load description box
 function loadDescription() {
    window.setTimeout(loadDescriptionB, 100);
}

 function loadDescriptionB() {
    //Get bottom panel box
    var botPanel = document.getElementById("lbc-bottompanel-box");
    botPanel.innerHTML = '<div id="description"><p>' + image_group_desc[window.curImageNum - 1] + '</p></div>';
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