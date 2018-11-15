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
  <div id="request_table" align="center">
    <table align="center" class="table-bordered table">
      <?php
        include("RequestsController.php");
        $requestsController = new RequestsController;

        $userNum = $_GET['pageNum'];
        $pageNum = ($userNum - ($userNum % 20)) / 20;
        $row = $requestsController->clickRequest($_SESSION['userPossition'], $_SESSION['userId'], $pageNum, $userNum, $_GET['type']);

       ?>
            <tr>
                <th class="">&nbsp;&nbsp;Name</th>
                <td class="memberinput">
                  <?php
                    echo '<textfield>'.$row['name'].'</textfield>';
                   ?>
                </td>
            </tr>
            <tr>
              <th>&nbsp;&nbsp;Gender</th>
              <td class="memberinput">
                <?php
                  echo '<textfield>'.$row['gender'].'</textfield>';
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

              if ($_SESSION['userPossition'] == "student"){
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
    <div class="">
      <?php
        echo '<input type="button" class="btn-dark" value="'.$_GET['type'].'" onclick="location.href=\'completeRequest.php?from_id='.$row['id'].'&type='.$_GET['type'].'\'">';
       ?>
    </div>
  </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>
