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
      <li><a href="Requests.php" style="color:#3a3f44;">Match</a></li>
      <li class="active"><a href="#" style="color:#3a3f44;">Counsel</a></li>
    </ul>

    <div id="request_table" align="center">
        <table class="search-table table table-hover">
            <thead>
              <tr>
                <th scope="col">index</th>
                <th scope="col">Name</th>
                <th scope="col">Course 1</th>
                <th scope="col">Course 2</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (isset($_GET['pageNum'])){
                  $pageNum = $_GET['pageNum'];
                } else {
                  $pageNum = 0;
                }
                include("RequestsController.php");
                $requestsController = new RequestsController;

                $result = $requestsController->loadRequest($_SESSION['userPossition'], $_SESSION['userId'], $pageNum, "counseling");
                $pageNum = $pageNum * 20;

                while ($row = $result->fetch_assoc()){
                  echo "<tr onclick='location.href=\"clickedRequest.php?pageNum=".$pageNum."&type=counseling\";'>";
                    echo "<td scope='row'>".($pageNum + 1)."</td>";
                    echo "<td scope='row'>".$row['name']."</td>";
                    echo "<td scope='row'>".$row['course1']."</td>";
                    echo "<td scope='row'>".$row['course2']."</td>";
                  echo "</tr>";

                  $pageNum = $pageNum + 1;
                }

               ?>
            </tbody>
        </table>
        <div class="text-center">
          <ul class="pagination">
            <?php
              $count = $requestsController->countRequest($_SESSION['userId'], $_SESSION['userPossition'], "counseling");
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
