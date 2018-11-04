<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="menu.css">
</head>
<body>

<div id="top_menu">
  <nav class="navbar navbar-darkgray">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="../MainPage.php" style="color:#ffffff;font-size:25px;">LectureChain</a>
      </div>
      <ul class="nav">
        <li><a href="SearchTeacher.php" style="color:#ffffff;font-size:16px;">Search Teacher</a></li>
        <li><a href="SearchStudent.php" style="color:#ffffff;font-size:16px;">Search Student</a></li>
        <li><a href="Requests.php" style="color:#ffffff;font-size:16px;">Requests</a></li>
        <li><a href="MyPage.php" style="color:#ffffff;font-size:16px;">My Page</a></li>
      </ul>
      <ul class="nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" custom-toggle="dropdown-over" style="color:#ffffff;font-size:16px;">
            member
          </a>
          <div class="dropdown-menu" style="min-width:150x;" align="center">
            <div align="center">
              <?php
                session_start();
                echo "<textfield>".$_SESSION['userName']."  </textfield>";
                echo "<textfield>".$_SESSION['userPossition']."</textfield>";
               ?>
            </div>
            <div align="center">
                <input type="button" value="Log-out" class="btn-warning" onclick="location.href='logout.php'">
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>

<div id="content" align="center">
  <div id="request_table" align="center" style="padding-bottom:50px;">
    <table align="center" class="table-bordered table">
            <tr>
                <th class="">&nbsp;&nbsp;Name</th>
                <td class="memberinput">
                  <?php
                    include("MyPageController.php");
                    $mypageController = new MyPageController;

                    $userNum = $_GET['pageNum'];
                    $basicId = $_GET['basicId'];
                    $pageNum = ($userNum - ($userNum % 20)) / 20;
                    $row = $mypageController->clickUser($_GET['position'],$basicId, $pageNum, $userNum);

                    echo '<textfield>'.$row['name'].'</textfield>';
                   ?>
                </td>
            </tr>
            <tr>
                <th class="">&nbsp;&nbsp;Tel</th>
                <td>
                  <?php
                    echo '<textfield>'.$row['tel1'].' - '.$row['tel2'].' - '.$row['tel3'].'</textfield>';
                   ?>
                </td>
            </tr>
            <?php

              if ($_GET['position'] == "teacher"){
                echo '<tr>';
                  echo '<th>&nbsp;&nbsp;University</th>';
                  echo '<td>';
                    echo '<textfield>'.$row['university'].'</textfield>';
                  echo '</td>';
                echo '</tr>';
                echo '<tr>';
                  echo '<th>&nbsp;&nbsp;Major</th>';
                  echo '<td>';
                    echo '<textfield>'.$row['major'].'</textfield>';
                  echo '</td>';
                echo '</tr>';
                echo '<tr>';
                  echo '<th>&nbsp;&nbsp;Degree</th>';
                  echo '<td>';
                    echo '<textfield>'.$row['degree'].'</textfield>';
                  echo '</td>';
                echo '</tr>';
                echo '<tr>';
                  echo '<th>&nbsp;&nbsp;career</th>';
                  echo '<td>';
                    echo '<textfield>'.$row['career'].'</textfield>';
                  echo '</td>';
                echo '</tr>';
              } else {
                echo '<tr>';
                echo '<th>&nbsp;&nbsp;School</th>';
                echo '<td>';
                  echo '<textfield>'.$row['school'].'</textfield>';
                echo '</td>';
                echo '</tr>';
              }

             ?>
            <tr>
                <th class="">&nbsp;&nbsp;Hope Course</th>
                <td class="memberinput">
                  <?php
                    echo '<textfield>'.$row['course1'].'     </textfield>';
                    echo '<textfield>'.$row['course2'].'</textfield>';
                   ?>
                </td>
            </tr>
            <tr>
                <th class="">&nbsp;&nbsp;Hope Area1</th>
                <td class="memberinput">
                  <?php
                    echo '<textfield>'.$row['sido1'].'  </textfield>';
                    echo '<textfield>'.$row['gugun1'].'</textfield>';
                   ?>
                </td>
            </tr>
            <tr>
                <th class="">&nbsp;&nbsp;Hope Area2</th>
                <td class="memberinput">
                  <?php
                    echo '<textfield>'.$row['sido2'].'  </textfield>';
                    echo '<textfield>'.$row['gugun2'].'</textfield>';
                   ?>
                </td>
            </tr>
            <tr>
                <th class="">&nbsp;&nbsp;About Me</th>
                <td class="memberinput">
                  <?php
                    echo '<textarea id="student_about_me" readonly="readonly"
                     name="aboutme" cols="55" rows="15"
                      class="form-control">'.$row['about'].'</textarea>';
                   ?>
                </td>
            </tr>
    </table>
  </div>

  <hr style="border-color:#596067;">

  <div id="reviewTable" align="center">
    <div class="row" style="margin-top:40px;">
		<div class="col-md-6">
    	<div class="well well-sm">
            <div class="text-right">
                <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
            </div>

            <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                    <form accept-charset="UTF-8" action="" method="post">
                        <input id="ratings-hidden" name="rating" type="hidden">
                        <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>

                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success btn-lg" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

		</div>
	</div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>
