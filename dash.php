<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Worlds || DASHBOARD </title>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <script>
    $(function () {
      $(document).on('scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop() >= $(".logo").height()) {
          $(".navbar").addClass("navbar-fixed-top");
        }
        if($(window).scrollTop() < $(".logo").height()) {
          $(".navbar").removeClass("navbar-fixed-top");
        }
      });
    });
  </script>
</head>
<body style="background:#eee;">
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
            </div>

            <?php
            include_once 'dbConnection.php';
            session_start();
            if (!(isset($_SESSION['email']))) {
                header("location:index.php");
            } else {
                $name = $_SESSION['name'];
                $email = $_SESSION['email'];
                include_once 'dbConnection.php';
                echo '<span class="pull-right top title1"><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php?q=1" class="log log1">' . $name . '</a>&nbsp;';
            }
            ?>
        </div>
    </div>
  <!-- navigation menu -->
  <!-- <nav class="navbar navbar-default title1"> -->
    <!-- <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> -->
        <!-- <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a> -->
      <!-- </div> -->
<div class="mainpage-container">
  <div class="sidebar-container" id="bs-example-navbar-collapse-1">
    <div class="sidebar-up">     
      <ul class="sidebar-thing">
        <li <?php if(@$_GET['q']==0) echo 'class="active"'; ?>><a href="dash.php?q=0"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==1) echo 'class="active"'; ?>><a href="dash.php?q=1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;User</a></li>
        <li <?php if(@$_GET['q']==2) echo 'class="active"'; ?>><a href="dash.php?q=2"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
        <li <?php if(@$_GET['q']==3) echo 'class="active"'; ?>><a href="dash.php?q=3"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Feedback</a></li>
        <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo 'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=4">Add Quiz</a></li>
            <li><a href="dash.php?q=5">Remove Quiz</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="sidebar-down">
      <ul class="sidebar-thing">
        <li><a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
      </ul>
    </div>
  
</div>

  <!-- </nav> -->
  <!-- navigation menu closed -->
  <div class="accountbg">
  <div class="container">
    <!-- container start -->
    <div class="row">
      <div class="col-md-12">
        <!-- home start -->
        <?php if(@$_GET['q']==0) { ?>
          <div class="panel">
            <div class="table-responsive">
              <table class="table table-striped title1">
                <tr>
                  <td><b>S.N.</b></td>
                  <td><b>Topic</b></td>
                  <td><b>Total question</b></td>
                  <td><b>Marks</b></td>
                  <td><b>Time limit</b></td>
                  <td></td>
                </tr>
                <?php
                  $result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                  $c = 1;
                  while($row = mysqli_fetch_array($result)) {
                    $title = $row['title'];
                    $total = $row['total'];
                    $sahi = $row['sahi'];
                    $time = $row['time'];
                    $eid = $row['eid'];
                    $q12 = mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
                    $rowcount = mysqli_num_rows($q12);
                    if($rowcount == 0) {
                      echo '<tr>';
                      echo '<td>'.$c++.'</td>';
                      echo '<td>'.$title.'</td>';
                      echo '<td>'.$total.'</td>';
                      echo '<td>'.$sahi*$total.'</td>';
                      echo '<td>'.$time.'&nbsp;min</td>';
                      echo '<td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td>';
                      echo '</tr>';
                    } else {
                      echo '<tr style="color:#99cc32">';
                      echo '<td>'.$c++.'</td>';
                      echo '<td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>';
                      echo '<td>'.$total.'</td>';
                      echo '<td>'.$sahi*$total.'</td>';
                      echo '<td>'.$time.'&nbsp;min</td>';
                      echo '<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td>';
                      echo '</tr>';
                    }
                  }
                ?>
              </table>
            </div>
          </div>
        <?php } ?>
        <!-- home closed -->
        <!-- users start -->
        <?php if(@$_GET['q']==1) { ?>
          <div class="panel">
            <div class="table-responsive">
              <table class="table table-striped title1">
                <tr>
                  <td><b>S.N.</b></td>
                  <td><b>Name</b></td>
                  <td><b>Gender</b></td>
                  <td><b>College</b></td>
                  <td><b>Email</b></td>
                  <td><b>Mobile</b></td>
                  <td></td>
                </tr>
                <?php
                  $result = mysqli_query($con,"SELECT * FROM user") or die('Error');
                  $c = 1;
                  while($row = mysqli_fetch_array($result)) {
                    $name = $row['name'];
                    $mob = $row['mob'];
                    $gender = $row['gender'];
                    $email = $row['email'];
                    $college = $row['college'];
                    echo '<tr>';
                    echo '<td>'.$c++.'</td>';
                    echo '<td>'.$name.'</td>';
                    echo '<td>'.$gender.'</td>';
                    echo '<td>'.$college.'</td>';
                    echo '<td>'.$email.'</td>';
                    echo '<td>'.$mob.'</td>';
                    echo '<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>';
                    echo '</tr>';
                  }
                ?>
              </table>
            </div>
          </div>
        <?php } ?>
        <!-- users end -->
        <!-- feedback start -->
        <?php if(@$_GET['q']==3) { ?>
          <div class="panel">
            <div class="table-responsive">
              <table class="table table-striped title1">
                <tr>
                  <td><b>S.N.</b></td>
                  <td><b>Subject</b></td>
                  <td><b>Email</b></td>
                  <td><b>Date</b></td>
                  <td><b>Time</b></td>
                  <td><b>By</b></td>
                  <td></td>
                  <td></td>
                </tr>
                <?php
                  $result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
                  $c = 1;
                  while($row = mysqli_fetch_array($result)) {
                    $date = $row['date'];
                    $date = date("d-m-Y",strtotime($date));
                    $time = $row['time'];
                    $subject = $row['subject'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $id = $row['id'];
                    echo '<tr>';
                    echo '<td>'.$c++.'</td>';
                    echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td>';
                    echo '<td>'.$email.'</td>';
                    echo '<td>'.$date.'</td>';
                    echo '<td>'.$time.'</td>';
                    echo '<td>'.$name.'</td>';
                    echo '<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
                    echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>';
                    echo '</tr>';
                  }
                ?>
              </table>
            </div>
          </div>
        <?php } ?>
        <!-- feedback closed -->
        <!-- feedback reading portion start -->
        <?php if(@$_GET['fid']) { ?>
          <br />
          <?php
            $id=@$_GET['fid'];
            $result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
            while($row = mysqli_fetch_array($result)) {
              $name = $row['name'];
              $subject = $row['subject'];
              $date = $row['date'];
              $date = date("d-m-Y",strtotime($date));
              $time = $row['time'];
              $feedback = $row['feedback'];
              echo '<div class="panel">';
              echo '<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a>';
              echo '<h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
              echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;">';
              echo '<span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>';
              echo '<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span>';
              echo '<span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';
            }
          ?>
        <?php } ?>
        <!-- feedback reading portion closed -->
        <!-- add quiz start -->
        <?php if(@$_GET['q']==4 && !(@$_GET['step'])) { ?>
          <div class="row">
            <span class="title1" style="margin-left:40%;font-size:30px;"><b></b></span><br /><br />
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="newquiz">
              <form class="form-horizontal title1" name="form" action="update.php?q=addquiz" method="POST">
                <fieldset>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="name"></label>
                    <div class="col-md-12">
                      <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
                    </div>
                  </div>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="total"></label>
                    <div class="col-md-12">
                      <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
                    </div>
                  </div>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="right"></label>
                    <div class="col-md-12">
                      <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
                    </div>
                  </div>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="wrong"></label>
                    <div class="col-md-12">
                      <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
                    </div>
                  </div>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="time"></label>
                    <div class="col-md-12">
                      <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
                    </div>
                  </div>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="tag"></label>
                    <div class="col-md-12">
                      <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
                    </div>
                  </div>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="desc"></label>
                    <div class="col-md-12">
                      <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for=""></label>
                    <div class="col-md-12">
                      <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                    </div>
                  </div>
                </fieldset>
              </form>
        </div>
            </div>
          </div>
        <?php } ?>
        <!-- add quiz end -->
        <!-- add quiz step2 start -->
        <?php if(@$_GET['q']==4 && (@$_GET['step'])==2) { ?>
          <div class="row">
            <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=<?php echo @$_GET['n']; ?>&eid=<?php echo @$_GET['eid']; ?>&ch=4 " method="POST">
                <fieldset>
                  <?php
                    for($i=1;$i<=@$_GET['n'];$i++) {
                      echo '<b>Question number&nbsp;'.$i.'&nbsp;:</b><br />';
                  ?>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="qns<?php echo $i; ?>"></label>
                    <div class="col-md-12">
                      <textarea rows="3" cols="5" name="qns<?php echo $i; ?>" class="form-control" placeholder="Write question number <?php echo $i; ?> here..."></textarea>
                    </div>
                  </div>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="<?php echo $i; ?>1"></label>
                    <div class="col-md-12">
                      <input id="<?php echo $i; ?>1" name="<?php echo $i; ?>1" placeholder="Enter option a" class="form-control input-md" type="text">
                    </div>
                  </div>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="<?php echo $i; ?>2"></label>
                    <div class="col-md-12">
                      <input id="<?php echo $i; ?>2" name="<?php echo $i; ?>2" placeholder="Enter option b" class="form-control input-md" type="text">
                    </div>
                  </div>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="<?php echo $i; ?>3"></label>
                    <div class="col-md-12">
                      <input id="<?php echo $i; ?>3" name="<?php echo $i; ?>3" placeholder="Enter option c" class="form-control input-md" type="text">
                    </div>
                  </div>
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="<?php echo $i; ?>4"></label>
                    <div class="col-md-12">
                      <input id="<?php echo $i; ?>4" name="<?php echo $i; ?>4" placeholder="Enter option d" class="form-control input-md" type="text">
                    </div>
                  </div>
                  <br />
                  <b>Correct answer</b>:<br />
                  <select id="ans<?php echo $i; ?>" name="ans<?php echo $i; ?>" placeholder="Choose correct answer " class="form-control input-md">
                    <option value="a">Select answer for question <?php echo $i; ?></option>
                    <option value="a">option a</option>
                    <option value="b">option b</option>
                    <option value="c">option c</option>
                    <option value="d">option d</option>
                  </select><br /><br />
                  <?php } ?>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for=""></label>
                    <div class="col-md-12">
                      <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        <?php } ?>
        <!-- add quiz step 2 end -->
        <!-- remove quiz -->
        <?php if(@$_GET['q']==5) {
          $result = mysqli_query($con,"SELECT * FROM quiz") or die('Error');
          echo '<div class="panel"><div class="table-responsive"><table class="table table-striped title1"><tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Action</b></td></tr>';
          $c = 1;
          while($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $sahi = $row['sahi'];
            $eid = $row['eid'];
            echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td><a title="Delete Quiz" href="update.php?q=rmquiz&eid='.$eid.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
          }
          $c = 0;
          echo '</table></div></div>';
        } ?>
      </div>
      </div>
    </div>
  </div>
  
  <!--container closed-->
</body>
</html>
