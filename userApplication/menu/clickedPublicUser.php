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
    .star-input>.input>input:focus+label,
    .star-input>.input>input:checked+label{display: inline-block;vertical-align:middle;background:url('../img/grade_img.png');}
    .star-input{display:inline-block; white-space:nowrap;width:225px;height:40px;padding:25px;line-height:30px;}
    .star-input>.input{display:inline-block;width:150px;background-size:150px;height:28px;white-space:nowrap;overflow:hidden;position: relative;}
    .star-input>.input>input{position:absolute;width:1px;height:1px;opacity:0;}
    star-input>.input.focus{outline:1px dotted #ddd;}
    .star-input>.input>label{width:30px;height:0;padding:28px 0 0 0;overflow: hidden;float:left;cursor: pointer;position: absolute;top: 0;left: 0;}
    .star-input>.input>input:focus+label,
    .star-input>.input>input:checked+label{background-size: 150px;background-position: 0 bottom;}
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
  <div id="request_table" align="center">
    <table align="center" class="table-bordered table">
      <?php
        include("SearchController.php");
        $searchController = new SearchController;

        $userNum = $_GET['pageNum'];
        $pageNum = ($userNum - ($userNum % 20)) / 20;
        $row = $searchController->clickUser($_GET['position'], $pageNum, $userNum);

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
    <div class="">
      <?php
        echo '<input type="button" class="btn-dark" value="Request" onclick="location.href=\'registerWaitUser.php?from_id='.$_SESSION['userId'].'&type=matching\'">';
        if ($_SESSION['userPossition'] == 'student'){
          echo '<input type="button" class="btn-dark" value="Counseling" onclick="location.href=\'registerWaitUser.php?from_id='.$row['id'].'&type=counseling\'">';
        }
       ?>

    </div>
  </div>
  <hr style="border-color:#596067;">
</div>

<div id="reviewTable" style="padding-left: 25%;padding-right: 25%; padding-bottom: 100px;">
  <?php

    $review = $searchController->searchReviewList($row['id']);

    $plabel = 1;

    if ($review){
      while ($row_review = $review->fetch_assoc()){
   ?>
    <div class="review" style="display:inline;" align="left">
      <span class="star-input" style="padding-bottom:50px;">
        <span class="input">
          <style>
          .star-input>.input>label[for="<?php echo "p".$plabel; ?>"]{width:30px;z-index:5;}
          </style>
          <input type="radio" name="star-input" value="1" id="<?php echo "p".$plabel; ?>" <?php if ($row_review['grade'] == 1) echo "checked"; ?> disabled>
          <label for="<?php echo "p".$plabel; ?>">1</label>
          <?php $plabel = $plabel + 1; ?>



          <style>
          .star-input>.input>label[for="<?php echo "p".$plabel; ?>"]{width:60px;z-index:4;}
          </style>
          <input type="radio" name="star-input" value="2" id="<?php echo "p".$plabel; ?>" <?php if ($row_review['grade'] == 2) echo "checked"; ?> disabled>
          <label for="<?php echo "p".$plabel; ?>">2</label>
          <?php $plabel = $plabel + 1; ?>


          <style>
          .star-input>.input>label[for="<?php echo "p".$plabel; ?>"]{width:90px;z-index:3;}
          </style>
          <input type="radio" name="star-input" value="3" id="<?php echo "p".$plabel; ?>" <?php if ($row_review['grade'] == 3) echo "checked"; ?> disabled>
          <label for="<?php echo "p".$plabel; ?>">3</label>
          <?php $plabel = $plabel + 1; ?>


          <style>
          .star-input>.input>label[for="<?php echo "p".$plabel; ?>"]{width:120px;z-index:2;}
          </style>
          <input type="radio" name="star-input" value="4" id="<?php echo "p".$plabel; ?>" <?php if ($row_review['grade'] == 4) echo "checked"; ?> disabled>
          <label for="<?php echo "p".$plabel; ?>">4</label>
          <?php $plabel = $plabel + 1; ?>


          <style>
          .star-input>.input>label[for="<?php echo "p".$plabel; ?>"]{width:150px;z-index:1;}
          </style>
          <input type="radio" name="star-input" value="5" id="<?php echo "p".$plabel; ?>" <?php if ($row_review['grade'] == 5) echo "checked"; ?> disabled>
          <label for="<?php echo "p".$plabel; ?>">5</label>
          <?php $plabel = $plabel + 1; ?>
        </span>
      </span>
      <div class="review-period" style="padding-bottom:5px;">
        <textfield><?php echo "Period : ".$row_review['complete_time']." ~ ".$row_review['review_time']; ?></textfield>
      </div>
      <div class="review-type" style="padding-bottom:10px;">
        <textfield><?php echo "Type : ".$row_review['type']; ?></textfield>
      </div>
      <div class="review-content" style="width:100%;padding-bottom:5px;">
        <textarea name="review" class="form-control" rows="3" cols="100" disabled><?php echo $row_review['content']; ?></textarea>
      </div>
    </div>

    <?php
    }
    }
      ?>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>
