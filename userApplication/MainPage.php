<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="menu/menu.css">
</head>
<body>

<div id="top_menu">
  <nav class="navbar navbar-darkgray">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="MainPage.php" style="color:#ffffff;font-size:25px;">LectureChain</a>
      </div>
      <ul class="nav">
        <li><a href="menu/SearchTeacher.php" style="color:#ffffff;font-size:16px;">Search Teacher</a></li>
        <li><a href="menu/SearchStudent.php" style="color:#ffffff;font-size:16px;">Search Student</a></li>
        <li><a href="menu/Requests.php" style="color:#ffffff;font-size:16px;">Requests</a></li>
        <li><a href="menu/MyPage.php" style="color:#ffffff;font-size:16px;">My Page</a></li>
      </ul>
      <ul class="nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" custom-toggle="dropdown-over" style="color:#ffffff;font-size:16px;">
            member
          </a>
          <div class="dropdown-menu" style="min-width:150px;" align="center">
            <div align="center" style="padding-top:5px;padding-bottom:10px;">
              <?php
                session_start();
               ?>
               <table class="table-borderless">
                <tr>
                  <th>Name</th>
                  <td><textfield><?php echo $_SESSION['userName']; ?></textfield></td>
                </tr>
                <tr>
                  <th>Position&nbsp;&nbsp;</th>
                  <td><textfield><?php echo $_SESSION['userPossition']; ?></textfield></td>
                </tr>
                <tr>
                  <th>Coin</th>
                  <td><textfield id='myCoin'></textfield></td>
                </tr>
               </table>
            </div>
            <div align="center">
                <input type="button" value="Log-out" class="btn-warning" onclick="location.href='./menu/logout.php'">
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>

<div id="content" align="center">
  <div style="padding-top:70px;">
    <?php
      include("menu/ItemController.php");

      $itemController = new ItemController;
      $itemController->checkTodayPeriod();
     ?>
    <table class="search-table table table-hover">
      <thead>
        <tr>
          <th scope="col" style="font-size:15px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;index</th>
          <th scope="col" style="font-size:15px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
          <th scope="col" style="font-size:15px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;Course 1</th>
          <th scope="col" style="font-size:15px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;Course 2</th>
          <th scope="col" style="font-size:15px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;University</th>
          <th scope="col" style="font-size:15px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;Gender</th>
          <th scope="col" style="font-size:15px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;Coin</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $today = $itemController->loadToday();
          $i = 1;

          while ($i <= 10){
            $row = $today->fetch_assoc();
            if ($_SESSION['userPossition'] == "student" && $itemController->searchLookup($row['id'])){
               $pageName = 'clickedPublicUser.php';
            } else {
              $pageName = 'clickedUser.php';
            }

            $pageNum = $itemController->getPageNum($row['id']);
            if ($row['name'] == ""){
              echo "<tr>";
            } else {
              echo "<tr onclick='location.href=\"menu/".$pageName."?pageNum=".$pageNum."&position=teacher\";'>";
            }
            if ($i == 1){
              echo "<td align='center' style='width:70px;height:70px;vertical-align:middle;'><img src='img/1st.png' style='width:60px;height:60px;'></td>";
            } else if ($i == 2){
              echo "<td align='center' style='width:70px;height:70px;vertical-align:middle;'><img src='img/2nd.png' style='width:50px;height:50px;'></td>";
            } else if ($i == 3){
              echo "<td align='center' style='width:70px;height:70px;vertical-align:middle;'><img src='img/3rd.png' style='width:40px;height:40px;'></td>";
            } else {
              echo "<td align='center' style='width:70px;height:70px;font-size:15px;vertical-align:middle;'>".$i."</td>";
            }
         ?>
         <td style="font-size:17px;vertical-align:middle;" align="center"><?php echo $row['name']; ?></td>
         <td style="font-size:17px;vertical-align:middle;" align="center"><?php echo $row['course1']; ?></td>
         <td style="font-size:17px;vertical-align:middle;" align="center"><?php echo $row['course2']; ?></td>
         <td style="font-size:17px;vertical-align:middle;" align="center"><?php echo $row['university']; ?></td>
         <td style="font-size:17px;vertical-align:middle;" align="center"><?php echo $row['gender']; ?></td>
         <td style="font-size:17px;vertical-align:middle;" align="center"><?php echo $row['coin']; ?></td>

       <?php $i++;
       echo "</tr>";
     } ?>
      </tbody>
    </table>
  </div>
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src='https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js'></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="TokenWeb3.js"></script>
<script type="text/javascript">
$(window).on("load",function(){
  getUserToken();
});
</script>
</body>
</html>
