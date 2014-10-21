<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>Create Trip</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/main.css">
<!--    font to be used for the web page (Open Sans)-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
            padding-right: 20px;
        }
        
        textarea {
            resize: none;
        }
        
        hr {
            -moz-border-bottom-colors: none;
            -moz-border-image: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            border: 2px solid #E4E4E4;
        }
        
        h2 {
            margin-top: 40px;
        }
        
        th {
            text-align: left;
        } 

        #tripdetails {
            width: 100%;
            line-height: 50px;
        }  
        #tripdetails td.col1 {
            width: 15%;
            vertical-align: top;
        }   
        #tripdetails td.col2 {
            width: 85%;
        }
        
        #imageGroupDetails1 {
            width: 100%;
            line-height: 50px;
        }       
        #imageGroupDetails1 td.col1 {
            width: 30%;
            vertical-align: top;
        }
        #imageGroupDetails1 td.col2 {
            width: 55%;
        }
        
        #imageGroupDetails2 {
            width: 100%;
            line-height: 50px;
        }       
        #imageGroupDetails2 td.col1 {
            width: 30%;
            vertical-align: top;
        }
        #imageGroupDetails2 td.col2 {
            width: 50%;
        }
        #imageGroupDetails2 td.col3 {
            width: 5%;
        }
        
    </style>
    
   <!-- Import the bootstrap files -->
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <!-- file upload -->
    <script src="js/jquery.form.js"></script>
    
    <script>
    window.imageGroupCount = 1;
    window.curImageGroup = 0;
    </script>
    
</head>

<body>
    
<div class="container">
   <!-- include navbar -->
   <?php $loggedIn = true; ?>
   <?php include_once "/includes/navbar.php"; ?>
    
    <!-- User input for the trip details -->
    <h2>Trip Details</h2> 
    <hr>
    
    <form action="/functions/form_processor.php" method="post">
    <table id = "tripdetails">
    <tbody><tr>
    <td class="col1">
    <label>Trip Name:</label></td>
    <td class="col2">
    <input type="text" id="trip_name" name="trip_name" placeholder="" class="form-control" style="
    display: inline-block;
    "></td>
    </tr>
    <tr>
    <td class="col1">
    <label>Trip Description:</label></td>
    <td class="col2">
    <textarea name="trip_desc" rows="5" class="form-control"></textarea> </td>
    </tr>
    <tr>
    <td class="col1">
    <label>Can be viewed by:</label></td>
    <td class="col2">
        <select name="trip_privacy" class="form-control" style="width: 150px;">
        <option value="everyone">Everyone</option>
        <option value="friends" selected="selected" >Friends</option>
        <option value="onlyme">Only Me</option>
        </select>
    </tr>
    </tbody>
    </table>
        
    <!-- Create Image Groups -->
    <h2 style="display:inline-flex">Image Groups</h2> 
        <button type="button" id="CreateImageHelp" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="right" title="Image Groups contain photographs of a general location to highlight the experiences you want to share."> 
            <script>$('#CreateImageHelp').tooltip();</script>
                <strong>?</strong>
        </button>
    <button style="float:right;margin-top:45px;"type="push" class="btn btn-default">Import Image Group</button>
    <hr>
    <p id ="image_group_error" class="error" ></p>
        <div id="image_groups" class="row">
            <div id="create_image_group_block" class="col-md-3 col-md-2">
                    <a href="#crImageGroupModal" role="button" data-toggle="modal" class="thumbnail">   
                        <img src="./img/create_image_group.jpg">
                    </a>
            </div> 
            <div id="image_group_links_block"></div>
            
        </div>
   
    <!-- Select Cover photo for the trip -->
    <h2>Cover Photo</h2>
    <hr>
        <input type="hidden" name="coverPhoto" value="" />
        <div class="row" align="center" style="margin-bottom: 12px;">
              <a href="#selectImageGroupCover" role="button" data-toggle="modal" class="thumbnail">Select an image</a>
            <button type="push" class="btn btn-default">Upload an image</button>
        </div>

    <!-- Finalisation buttons -->
    <div class="row" align="right" style="margin-bottom: 12px;">
        <input type="hidden" name="source" value="create_trip" />
        <button type="push" class="btn">Cancel</button>
        <button type="submit" class="btn btn-success">Save Trip</button>
        <button type="push" class="btn btn-success">Preview Trip</button>
    </div>  
    </form>
    
    <!-- Modal Windows -->
    
    <!-- Add Image Group modal window -->
    <div class="modal fade" id="crImageGroupModal" tabindex="-1" role="dialog" aria-labelledby="crImageGroupModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="crImageGroupModalLabel">Create a new image group</h4>
          </div>
          <div class="modal-body">

            <!-- content -->
            <table id = "imageGroupDetails1">
            <tbody><tr>
            <td class="col1">
            <label>Image Group Name:</label></td>
            <td class="col2">
            <input type="text" id="image_group_name" placeholder="" class="form-control" style="
            display: inline-block;
            "></td>
            </tr>
            </tbody>
            </table>
              
            <table id = "imageGroupDetails2">
            <tbody><tr>             
            <td class="col1">
            <label>Location:</label></td>
            <td class="col2">
            <input type="text" id="image_group_location" placeholder="" class="form-control" style="
            display: inline-block;
            "></td>
            <td class="col3" align="center">
                <img src="./img/small_trip_tag.png">
            </td>
            </tr>
            </tbody>
            </table>
          </div>
          
          <!-- Script to add image groups to form for processing -->
          <script>
          $(document).ready(function(){
            $("#create_image_group_btn").click(function(){
              if ($('#image_group_name').val() != "" &&
                  $('#image_group_location').val() ) {
              
              $("#create_image_group_block").before("<div class=\"col-md-3 col-md-2\" id=\"imagegroup-"+ window.imageGroupCount + "\" onclick=\"window.curImageGroup =" + window.imageGroupCount + "\"><a href=\"#addImagesToImageGroup\" role=\"button\" data-toggle=\"modal\" class=\"thumbnail\"><img id=\"image_group_display_pic_" + window.imageGroupCount + "\" src=\"./img/empty_image_group.jpg\"></a><input class=\"form-control\" type=\"hidden\" name=\"image_group_name\" value=\"" 
              + $('#image_group_name').val() + "\" /><input class=\"form-control\" type=\"hidden\" name=\"image_group_location\" value=\"" 
              + $('#image_group_location').val() + "\" /></div>");
              
              //Clear Image contents
              $('#image_group_name').val("");
              $('#image_group_location').val("");
              
              //Clear previous errors
              $('#image_group_error').text("");
              
              //Increment count
              ++window.imageGroupCount;
              
              }
              //Show error
              else {
              $('#image_group_error').text("Error adding image group. Some required data was missing, please try again.");
              }
            });
            
          });
          </script>
          
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" id="create_image_group_btn" class="btn btn-success" data-dismiss="modal">Create</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Add images to Image Group modal window -->
    <div class="modal fade" id="addImagesToImageGroup" tabindex="-1" role="dialog" aria-labelledby="addImagesToImageGroupLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="addImagesToImageGroupLabel">Upload Images to Image Group</h4>
          </div>
          <div class="modal-body">

            <!-- content -->
            <script type="text/javascript" >
            $(document).ready(function() {
              $('#submitbtn').click(function() {
              $("#viewimage").html('');
              $("#viewimage").html('<img src="img/loading.gif" />');
              $(".uploadform").ajaxForm({
              target: '#viewimage'
              }).submit();
              });
              
              $("#save_changes_2_btn").click(function(){
                var links = getCookie("image_links");
                
                if (links != "") {
                  alert(links);
                }
              });
             
            });
            </script>
            
            
            <script type="text/javascript">
           //Add image by appending a hidden input field to image_group_links_block
            function addImage(url) {
              $('#image_group_links_block').append("<input type=\"hidden\" name=\"image_group_links_" + window.curImageGroup + "\" value=\"" + url + "\" />");
              
              //If empty image group, update picture to first uploaded
              if ($('#image_group_display_pic_' + window.curImageGroup).attr('src') == './img/empty_image_group.jpg') {
                console.log(1);
           
                $('#image_group_display_pic_' + window.curImageGroup).attr('src', "uploads/" + url);
              }
            }
            </script>
                  
            <form class="uploadform" method="post" enctype="multipart/form-data" 
            action='functions/image_upload.php'>
            
            Upload your image 
           
            <div id="filediv">
            <input name="file[]" type="file" id="file" multiple="true" />
            </div><br/>
            
            <input type="submit" value="Upload File" name="submitbtn" id="submitbtn" class="upload"/>
            
            </form>
            <!-- The uploaded image will display here -->
            <br />
            <br />
            <div id='viewimage'></div>
            
          </div>
          
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" id="save_changes_2_btn" class="btn btn-success" data-dismiss="modal">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Select cover photo modal window -->
    <div class="modal fade" id="selectImageGroupCover" tabindex="-1" role="dialog" aria-labelledby="selectImageGroupCoverLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="selectImageGroupCoverLabel">Select Image Group Cover Photo</h4>
          </div>
          <div class="modal-body">
            <!-- content -->
            <div style="height:400px;width:600px;overflow:auto;">
              <script>
              for(var i = 0; i < window.imageGroupCount; ++i) {
                //For each image group, display its images
                var input_list = document.getElementsByName('image_group_links_' + i);
                
                for(var j = 0; j < input_list.length; ++j) {
                    console.debug(input_list[i].value, input_list[i].getAttribute('value'));
                }
              }
              
              </script>
            </div>
            
          </div>
          
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" id="save_changes_3_btn" class="btn btn-success" data-dismiss="modal">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
    
    
    

    
</div>

</body>

</html>

