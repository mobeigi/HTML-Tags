<?php include("/../_php/_session.php"); ?>

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
			  <a class="navbar-brand" href="/"><img src="/img/logo/white.png" class="logo-image"></a>
			</div>
            
            
 <!--        Username and password and navbar links-->
			<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
				 <ul class="nav navbar-nav">
                      <?php if (isset($_SESSION['user_id'])){ ?>
					       print '<li><a href="http://triptags.azurewebsites.net/profile.php">Profile</a></li>';
                      <?php } else { ?> 
                    print '<li><a href="http://triptags.azurewebsites.net/register.php">Register</a></li>';
                   <?php   }?>
					  <li><a href="#">Tutorial</a></li>
					  <li><a href="#">Help</a></li>
					  <li><a href="#">Contact</a></li>
					  <li><a href="#">About</a></li>
				 </ul>
                 <?php if (isset($_SESSION['user_id'])){ ?>
                     
                    <!-- Button trigger share link modal -->
                    <button class="btn btn-default" data-toggle="modal" data-target="#myModal">
                      Share Trip
                    </button>                     
                     
                 <?php } ?>
                 <?php if (isset($_SESSION['user_id'])) { ?>
					  <form class="navbar-form navbar-right" action="/_php/_logout.php">
                        <button type="submit" class="btn btn-success">Log out</button>
                      </form>
                 <?php } else { ?>
                      <form class="navbar-form navbar-right" action="/_php/_login.php" method="post">
                          <div class="form-group">
                                <input type="text" name="userEmail" placeholder="Email" class="form-control">
                          </div>
                          <div class="form-group">
                                <input type="password" name="userPassword" placeholder="Password" class="form-control">
                          </div>
                          <button type="submit" class="btn btn-success">Log in</button>
                      </form>
                 <?php } ?>
			</div><!--/.navbar-collapse -->
		 </div>
	  </nav>
