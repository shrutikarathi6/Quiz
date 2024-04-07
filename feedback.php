<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Project Worlds || FEEDBACK </title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <!--alert message-->
  <?php if(@$_GET['w']) {echo'<script>alert("'.@$_GET['w'].'");</script>';} ?>
  <!--alert message end-->
</head>

<body>

  <!--header start-->
  <!-- <div class="row header">
    <div class="col-lg-6">
      <span class="logo">Test Your Skill</span>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <?php
      // include_once 'dbConnection.php';
      // session_start();
      // if((!isset($_SESSION['email']))) {
      //   echo '<a href="#" class="pull-right sub1 btn title3" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;Signin</a>&nbsp;';
      // } else {
      //   echo '<a href="logout.php?q=feedback.php" class="pull-right sub1 btn title3"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</a>&nbsp;';
      // }
      ?>
      <a href="index.php" class="pull-right btn sub1 title3"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home</a>&nbsp;
    </div>
  </div> -->
  <div class="header">
        <div class="navbar">
            <div class="navbarheading">
                <span class="logo">Netcamp</span>
            </div>

            <div class="navbarelement">

                <!-- <a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#login"><span class="title1"><b>AdminLogin</b></span></a> -->
                <!-- <a href="feedback.php" class="pull-right btn sub1" target="_blank"><span class="title1"><b>Feedback</b></span></a> -->
                <!-- <a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#developers"><span class="title1"><b>Project By</b></span></a> -->
                <!-- <a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal"><span class="title1"><b>Signin</b></span></a> -->
                <a href="index.php" class="pull-right btn sub1 title3"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home</a>&nbsp;
                <?php
                include_once 'dbConnection.php';
                session_start();
                if((!isset($_SESSION['email']))) {
                  echo '<a href="#" class="pull-right sub1 btn title3" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;Signin</a>&nbsp;';
                } else {
                  echo '<a href="logout.php?q=feedback.php" class="pull-right sub1 btn title3"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</a>&nbsp;';
                }
                ?>
            </div>

           
        </div>
    </div>

  <!--sign in modal start-->
  <!-- <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content title1">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title title1"><span style="color:orange">Log In</span></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="login.php?q=index.php" method="POST">
            <fieldset>
              Text input
              <div class="form-group">
                <label class="col-md-3 control-label" for="email"></label>
                <div class="col-md-6">
                  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
                </div>
              </div>

              Password input
              <div class="form-group">
                <label class="col-md-3 control-label" for="password"></label>
                <div class="col-md-6">
                  <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
                </div>
              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Log in</button>
          </fieldset>
          </form>
        </div>
      </div> -->
                  <!--sign in modal start-->
                  <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content title1">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="signinheading"><span style="color:#403d39">Log In</span></h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="login.php?q=index.php" method="POST">
                                <fieldset>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="email"></label>
                                        <div class="col-md-6">
                                            <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
                                        </div>
                                    </div>
                                    <!-- Password input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="password"></label>
                                        <div class="col-md-6">
                                            <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
                                        </div>
                                    </div>
                        </div>
                        <div class="signinbutton">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                        </fieldset>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!--sign in modal closed-->

  <!--header end-->

  <div class="feedback">
    <!-- <div class="row"> -->
      <!-- <div class="col-md-3"></div> -->
      <div class="feedbackcontainer">
        <h2 text-align="center" style="font-family:'typo'; color:#000066">FEEDBACK</h2>
        <div style="font-size:14px">
          <?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
          else {echo' 
            <form role="form" method="post" action="feed.php?q=feedback.php">
              <div class="row">
                <div class="col-md-3"><b>Name:</b><br /><br /><br /><b>Subject:</b></div>
                <div class="col-md-9">
                  <!-- Text input-->
                  <div class="form-group">
                    <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text"><br />
                    <input id="name" name="subject" placeholder="Enter subject" class="form-control input-md" type="text">
                  </div>
                </div>
              </div><!--End of row-->

              <div class="row">
                <div class="col-md-3"><b>E-Mail address:</b></div>
                <div class="col-md-9">
                  <!-- Text input-->
                  <div class="form-group">
                    <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
                  </div>
                </div>
              </div><!--End of row-->

              <div class="form-group">
                <textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..."></textarea>
              </div>
              <div class="form-group" align="center">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
              </div>
            </form>';}?>
        </div><!--col-md-6 end-->
        <div class="col-md-3"></div>
      </div>
    <!-- </div> -->
  </div><!--container end-->

  <!--Footer start-->



  <!--Modal for admin login-->
  <!-- <div class="modal fade" id="login">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">LOGIN</span></h4>
        </div>
        <div class="modal-body title1">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form role="form" method="post" action="admin.php?q=index.php">
                <div class="form-group">
                  <input type="text" name="uname" maxlength="20" placeholder="Admin user id" class="form-control" />
                </div>
                <div class="form-group">
                  <input type="password" name="password" maxlength="15" placeholder="Password" class="form-control" />
                </div>
                <div class="form-group" text-align="center">
                  <input type="submit" name="login" value="Login" class="btn btn-primary" />
                </div>
              </form>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div> -->
      <!-- </div>/.modal-content -->
    <!-- </div>/.modal-dialog -->
  <!-- </div>/.modal -->
  <!--footer end-->
</body>

</html>
