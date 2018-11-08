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
          <div class="dropdown-menu" style="min-width:150px;" align="center">
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
  <ul class="nav nav-tabs">
    <li ><a href="MyPage.php" style="color:#3a3f44;">Information</a></li>
    <li ><a href="MyPage_edit.php" style="color:#3a3f44;">Edit</a></li>
    <li class="active"><a href="MyPage_matched.php" style="color:#3a3f44;">Matched List</a></li>
    <li ><a href="MyPage_coin.php" style="color:#3a3f44;">Coin Using</a></li>
    <li ><a href="MyPage_usage.php" style="color:#3a3f44;">Usage History</a></li>
  </ul>

  <div id="request_table" align="center">
    <table class="search-table table table-hover">
      <thead>
        <tr>
          <th scope="col">index</th>
          <th scope="col">Name</th>
          <th scope="col">Course 1</th>
          <th scope="col">Course 2</th>
          <th scope="col">
            <?php
              if($_SESSION['userPossition'] == 'teacher'){
                echo "School Year";
              }
              else{
                echo "University";
              }
            ?></th>
            <th scope="col">Type</th>
            <th scope="col">Time</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if (isset($_GET['pageNum'])){
            $pageNum = $_GET['pageNum'];
          } else {
            $pageNum = 0;
          }

          include("MypageController.php");
          $mypageController = new MyPageController;

          $position = $_SESSION['userPossition'];
          $iam = $_SESSION['userId'];

          $result = $mypageController->loadUser($position,$iam,$pageNum);
          $pageNum = $pageNum * 20;

          // 본인이 학생인 경우. 선생 정보를 나열해야한다.
          if($position == 'student'){
            while ($row = $result->fetch_assoc()){
              echo "<tr onclick='location.href=\"clickedMatchedUser.php?pageNum=".$pageNum."&basicId=".$_SESSION['userId']."&position=teacher&type=".$row['type']."\";'>";
                echo "<td scope='row'>".($pageNum + 1)."</td>";
                echo "<td scope='row'>".$row['name']."</td>";
                echo "<td scope='row'>".$row['course1']."</td>";
                echo "<td scope='row'>".$row['course2']."</td>";
                echo "<td scope='row'>".$row['university']."</td>";
                echo "<td scope='row'>".$row['type']."</td>";
                echo "<td scope='row'>".$row['time']."</td>";
              echo "</tr>";

              $pageNum = $pageNum + 1;
            }
          }
          // 본인이 선생인 경우. 학생 정보를 나열해야한다.
          else{
            while ($row = $result->fetch_assoc()){
              echo "<tr onclick='location.href=\"clickedMatchedUser.php?pageNum=".$pageNum."&basicId=".$_SESSION['userId']."&position=student&type=".$row['type']."\";'>";
                echo "<td scope='row'>".($pageNum + 1)."</td>";
                echo "<td scope='row'>".$row['name']."</td>";
                echo "<td scope='row'>".$row['course1']."</td>";
                echo "<td scope='row'>".$row['course2']."</td>";
                echo "<td scope='row'>".$row['school']."</td>";
                echo "<td scope='row'>".$row['type']."</td>";
                echo "<td scope='row'>".$row['time']."</td>";
              echo "</tr>";

              $pageNum = $pageNum + 1;
            }
          }
         ?>
      </tbody>
    </table>

    <div class="text-center">
      <ul class="pagination">
        <?php
          $count = $mypageController->countUser('complete_request');
          $count = $count / 21;
          $a = 0;
          while ($a <= $count){
            echo '<li><a href="?pageNum='.$a.'" style="color:black;">'.($a + 1).'</a></li>';
            $a = $a + 1;
          }
         ?>
      </ul>
    </div>
  </div>

</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>
