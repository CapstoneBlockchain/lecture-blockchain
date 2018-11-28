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
                <input type="button" value="Log-out" class="btn-warning" onclick="location.href='logout.php'">
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>


<div id="content" align="center">
  <div class="sub-title" align="left" style="padding-bottom:30px;">
    <h3 style="font-weight:bold;">MyPage</h4>
  </div>

  <ul class="nav nav-tabs">
    <li ><a href="MyPage.php" style="color:#3a3f44;">Information</a></li>
    <li ><a href="MyPage_edit.php" style="color:#3a3f44;">Edit</a></li>
    <li ><a href="MyPage_matched.php" style="color:#3a3f44;">Matched List</a></li>
    <li class="active"><a href="MyPage_coin.php" style="color:#3a3f44;">Coin Using</a></li>
    <li ><a href="MyPage_usage.php" style="color:#3a3f44;">Usage History</a></li>
  </ul>

  <div class="" style="padding-top:50px;">
    <form class="" action="addItem.php" method="post">
      <table class="table-borderless" style="width:70%;">
        <input type="hidden" name="type" value="bold">
        <tr>
          <td style="width:40%;"><h4>Bolding</h4></td>
          <td style="width:40%;"></td>
          <td>
            <input id="bolding_submit" type="submit" name="" value="Buy" class="btn-dark btn" disabled>
          </td>
          <td>
            <input type="button" name="" value="Check" class="btn-dark btn" onclick="window.checkUsable('bolding_submit', 2)">
          </td>
        </tr>
        <tr>
          <td colspan="2"><h5>This item can be used for a week. (Required Coin: 10)</h5></td>
        </tr>
      </table>
    </form>
  </div>

  <div class="" style="padding-top:50px;">
    <form class="" action="addItem.php" method="post">
      <table class="table-borderless" style="width:70%;">
        <input type="hidden" name="type" value="background">
        <tr>
          <td style="width:40%;"><h4>Background Color</h4></td>
          <td style="width:40%;"><select id="background" class="form-control" name="background" style="height:30px;width:100px;" onchange="window.background()">
            <option value=""></option>
            <option value="yellow" style="background:yellow;"></option>
            <option value="palegreen" style="background:palegreen;"></option>
            <option value="turquoise" style="background:turquoise;"></option>
            <option value="lavender" style="background:lavender;"></option>
            <option value="skyblue" style="background:skyblue;"></option>
          </select></td>
          <td>
            <input id="background_submit" type="submit" name="" value="Buy" class="btn-dark btn" disabled>
          </td>
          <td>
            <input type="button" name="" value="Check" class="btn-dark btn" onclick="window.checkUsable('background_submit', 2)">
          </td>
        </tr>
        <tr>
          <td colspan="2"><h5>This item can be used for a week. (Required Coin: 10)</h5></td>
        </tr>
      </table>
    </form>
  </div>

  <?php
    if ($_SESSION['userPossition'] == 'teacher'){
      include("ItemController.php");

      $itemController = new ItemController;

      $max = $itemController->loadMaxToday();
      $mine = $itemController->loadMineToday($_SESSION['userId']);
   ?>
   <div class="" style="padding-top:50px;">
     <form class="" action="addItem.php" method="post">
       <input type="hidden" name="type" value="today">
       <table class="table-borderless" style="width:70%;">
         <tr>
           <td colspan="2"><h4 style="font-weight:bold;">Auctions:<?php echo $max; ?>  Mine:<?php echo $mine; ?></h4></td>
         </tr>
         <tr>
           <td style="width:40%;"><h4>Today's teacher</h4></td>
           <td style="width:40%;">
             <input id="today_text" type="text" name="coin" value="" class="form-control" style="width:100px;">
           </td>
           <td>
             <input id="today_submit" type="submit" name="" value="Buy" class="btn-dark btn" disabled>
           </td>
           <td>
             <input type="button" name="" value="Check" class="btn-dark btn" onclick="window.checkUsable('today_submit', 0)">
           </td>
         </tr>
         <tr>
           <td colspan="2"><h5>This item can be used for a day.</h5></td>
         </tr>
       </table>
     </form>
   </div>
  <?php } ?>
</div>

<script src='https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="background.js"></script>
<script type="text/javascript" src="../TokenWeb3.js"></script>
<script type="text/javascript">
$(window).on("load",function(){
  getUserToken();
});
</script>
</body>
</html>
