<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	  <div class="container-fluid">
 <!--        mobile menu to expand-->
			<div class="navbar-default">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				 <span class="sr-only">Toggle navigation</span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="/"><img src="/img/tripblack.png" class="logo-image"></a>
			</div>
            
            
 <!--        Username and password and navbar links-->
			<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
				 <ul class="nav navbar-nav">
                      <?php if (isset($loggedIn) && ($loggedIn == true)) { ?>
					       <li><a href="#">Profile</a></li>
                      <?php } ?>
					  <li><a href="#">Tutorial</a></li>
					  <li><a href="#">Help</a></li>
					  <li><a href="#">Contact</a></li>
					  <li><a href="#">About</a></li>
				 </ul>
                 <form class="navbar-form navbar-right" role="form">
                 <?php if (isset($tripViewer) && ($tripViewer == true)) { ?>
                     
                    <!-- Button trigger modal -->
                    <button class="btn btn-default" data-toggle="modal" data-target="#myModal">
                      Share Trip
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Trip Link</h4>
                          </div>
                          <div class="modal-body">
                              <p>Give the following link to your friends:</p>
                              <p>http://triptags.azurewebsites.net/view_page.php?trip=19292</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                     
                     
                 <?php } ?>
                 <?php if (isset($loggedIn) && ($loggedIn == true)) { ?>
					  <button type="submit" class="btn btn-success">Log out</button>
                 <?php } else { ?>
                      <div class="form-group">
							<input type="text" placeholder="Email" class="form-control">
					  </div>
					  <div class="form-group">
							<input type="password" placeholder="Password" class="form-control">
					  </div>
					  <button type="submit" class="btn btn-success">Sign in</button>
                 <?php } ?>
                 </form>
			</div><!--/.navbar-collapse -->
		 </div>
	  </nav>