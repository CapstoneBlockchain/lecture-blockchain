<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="menu.css">
    <style>
    .star-input>.input,
    .star-input>.input>label:hover,
    .star-input>.input>input:focus+label,
    .star-input>.input>input:checked+label{display: inline-block;vertical-align:middle;background:url('../img/grade_img.png')no-repeat;}
    .star-input{display:inline-block; white-space:nowrap;width:225px;height:40px;padding:25px;line-height:30px;}
    .star-input>.input{display:inline-block;width:150px;background-size:150px;height:28px;white-space:nowrap;overflow:hidden;position: relative;}
    .star-input>.input>input{position:absolute;width:1px;height:1px;opacity:0;}
    star-input>.input.focus{outline:1px dotted #ddd;}
    .star-input>.input>label{width:30px;height:0;padding:28px 0 0 0;overflow: hidden;float:left;cursor: pointer;position: absolute;top: 0;left: 0;}
    .star-input>.input>label:hover,
    .star-input>.input>input:focus+label,
    .star-input>.input>input:checked+label{background-size: 150px;background-position: 0 bottom;}
    .star-input>.input>label:hover~label{background-image: none;}
    .star-input>.input>label[for="p1"]{width:30px;z-index:5;}
    .star-input>.input>label[for="p2"]{width:60px;z-index:4;}
    .star-input>.input>label[for="p3"]{width:90px;z-index:3;}
    .star-input>.input>label[for="p4"]{width:120px;z-index:2;}
    .star-input>.input>label[for="p5"]{width:150px;z-index:1;}
    </style>
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
</div>

<?php
  include("SearchController.php");

  $searchController = new SearchController;

  $review = $searchController->searchReview($row['id'], $_SESSION['userId'], $_GET['type']);

  if ($_SESSION['userPossition'] == 'student' && !$review){
 ?>

<div id="reviewTable" style="padding-left: 25%;padding-right: 25%; padding-bottom: 100px;">
  <form class="" action="review.php?from_id=<?php echo $row['id']; ?>&type=<?php echo $_GET['type']; ?>" method="post">
    <div class="review" style="display:inline;">
      <textfield><?php echo $_SESSION['userName']; ?></textfield>
      <span class="star-input" style="padding-bottom:50px;">
        <span class="input">
          <input type="radio" name="star-input" value="1" id="p1">
          <label for="p1">1</label>
          <input type="radio" name="star-input" value="2" id="p2">
          <label for="p2">2</label>
          <input type="radio" name="star-input" value="3" id="p3">
          <label for="p3">3</label>
          <input type="radio" name="star-input" value="4" id="p4">
          <label for="p4">4</label>
          <input type="radio" name="star-input" value="5" id="p5">
          <label for="p5">5</label>
        </span>
      </span>
      <div class="review-content" style="width:100%;padding-bottom:5px;">
        <textarea name="review" class="form-control" rows="3" cols="100"></textarea>
      </div>
      <div align="right">
        <input type="submit" value="submit" class="btn-dark">
      </div>
    </div>
  </form>
</div>

<?php
}

if ($review){
  ?>

  <div id="reviewTable" style="padding-left: 25%;padding-right: 25%; padding-bottom: 100px;">
    <?php

     ?>
      <div class="review" style="display:inline;" align="left">
        <div><img src="../img/<?php echo $review['grade']; ?>.png"></div>
        <div class="review-period" style="padding-bottom:5px;">
          <textfield><?php echo "Period : ".$review['complete_time']." ~ ".$review['review_time']; ?></textfield>
        </div>
        <div class="review-type" style="padding-bottom:10px;">
          <textfield><?php echo "Type : ".$review['type']; ?></textfield>
        </div>
        <div class="review-content" style="width:100%;padding-bottom:5px;">
          <textarea name="review" class="form-control" rows="3" cols="100" disabled><?php echo $review['content']; ?></textarea>
        </div>
      </div>
  </div>

<?php
}
 ?>
 <script src='https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="star.jsS"></script>
</body>
</html>
