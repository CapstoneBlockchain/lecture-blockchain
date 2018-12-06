<head>
  <meta charset="utf-8">
</head>

<?php
  class ItemController{
    function registerBold($position, $id){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $time = date("Y-m-d H:i:s");

      $table = $position."_bold";

      $sql = "INSERT INTO $table (id, time)";
      $sql = $sql." VALUES('$id', '$time')";

      include("CoinController.php");

      $coinController = new CoinController;

      if ($mysqli->query($sql)){
        $coinController->register($id, $position, "bold", 10);
        echo "<script src='https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js'></script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
        echo '<script type="text/javascript" src="../TokenWeb3.js"></script>';
        echo '<script type="text/javascript">
              alert("Bolding 구매를 위해 트랜잭션을 전송하였습니다.");
              buyItem(10);
              </script>';
      } else {
        echo '<script type="text/javascript">
              alert("Bolding 구매에 실패하였습니다.");
              </script>';
      }
    }

    function registerBackground($position, $id, $color){
      if ($color == ""){
        echo '<script type="text/javascript">
              alert("배경색을 선택해주세요.");
              </script>';
        return;
      }


      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $time = date("Y-m-d H:i:s");

      $table = $position."_color";

      $sql = "INSERT INTO $table (id, color, time)";
      $sql = $sql." VALUES('$id', '$color', '$time')";

      include("CoinController.php");

      $coinController = new CoinController;

      if ($mysqli->query($sql)){
        $coinController->register($id, $position, "background", 10);
        echo "<script src='https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js'></script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
        echo '<script type="text/javascript" src="../TokenWeb3.js"></script>';
        echo '<script type="text/javascript">
              alert("배경색 구매를 위해 트랜잭션을 전송하였습니다.");
              buyItem(10);
              </script>';
      } else {
        echo '<script type="text/javascript">
              alert("배경색 구매에 실패하였습니다.");
              </script>';
      }
    }

    function registerToday($id, $coin){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");
      $sql= "SELECT coin FROM today WHERE id='$id'";
      $result = $mysqli->query($sql);

      $row = $result->fetch_row();
      $time = date("Y-m-d H:i:s");

      include("CoinController.php");

      $coinController = new CoinController;

      $position = $_SESSION['userPossition'];

      $coinController->register($id, $position, "today", $coin);

      if ($row[0]){
        $coin = $coin + $row[0];
        $sql = "UPDATE today SET id = '$id', time = '$time', coin = $coin WHERE id = '$id'";
        $result = $mysqli->query($sql);
      } else {
        $sql = "INSERT INTO today (id, time, coin) VALUES('$id', '$time', $coin)";
        $result = $mysqli->query($sql);
      }
      echo "<script src='https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js'></script>";
      echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
      echo '<script type="text/javascript" src="../TokenWeb3.js">
            </script>';
      echo '<script type="text/javascript">
            alert("오늘의 교사에 등록하기 위해 트랜잭션을 전송였습니다.");
            buyItem('.$coin.');
            </script>';
    }

    function getPageNum($id){
      include("config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");
      $sql = "SELECT * FROM teacher WHERE 1 ORDER BY id DESC";

      $result = $mysqli->query($sql);
      $pageNum = 0;

      while ($row = $result->fetch_assoc()){
        if ($row['id'] == $id){
          return $pageNum;
        }
        $pageNum++;
      }
    }

    function loadBold($id, $position){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");
      $table = $position."_bold";

      $sql = "SELECT * FROM $table WHERE id='$id'";
      $result = $mysqli->query($sql);

      $count = mysqli_num_rows($result);

      if ($count != 0){
        return $result;
      } else {
        return false;
      }
    }

    function loadBackground($id, $position){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");
      $table = $position."_color";

      $sql = "SELECT * FROM $table WHERE id='$id'";
      $result = $mysqli->query($sql);

      $count = mysqli_num_rows($result);

      if ($count != 0){
        return $result;
      } else {
        return false;
      }
    }

    function loadToday(){
      include("config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");
      $minNum = 0;
      $maxNum = 9;

      $sql = "SELECT * FROM teacher JOIN today ON teacher.id = today.id
      WHERE 1 ORDER BY coin DESC LIMIT $minNum, $maxNum";

      $result = $mysqli->query($sql);

      return $result;
    }

    function loadTeacher($userNum){
      include("config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $i = 0;
      $minNum = 0;
      $maxNum = 9;

      $sql = "SELECT * FROM teacher JOIN today ON teacher.id = today.id
      WHERE 1 ORDER BY coin DESC LIMIT $minNum, $maxNum";

      $result = $mysqli->query($sql);

      while ($i < 10){
        $row = $result->fetch_assoc();
        if($i == $userNum){
          return $row;
        }
        $i++;
      }
    }

    function searchLookup($id){
      include("config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");
      $userId = $_SESSION['userId'];
      $sql = "SELECT * FROM lookup WHERE from_id = '$userId' and to_id = '$id'";
      $result = $mysqli->query($sql);
      if ($row = $result->fetch_assoc()){
        return true;
      } else {
        return false;
      }
    }

    function loadMaxToday(){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $sql = "SELECT MAX(coin) FROM today";

      $result = $mysqli->query($sql);

      $row = $result->fetch_row();

      if ($row[0]){
        return $row[0];
      } else {
        return 0;
      }
    }

    function loadMineToday($id){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $sql= "SELECT coin FROM today WHERE id='$id'";
      $result = $mysqli->query($sql);

      $row = $result->fetch_row();

      if ($row[0]){
        return $row[0];
      } else {
        return 0;
      }
    }

    function checkTeacherPeriod(){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $sql_t = "SELECT * FROM teacher_bold WHERE 1";
      $result_t = $mysqli->query($sql_t);

      while ($row_t = $result_t->fetch_assoc()){
        $time = $row_t['time'];
        $week = strtotime("+1 week");
        $current_time = date("Y-m-d H:i:s");
        $time_week = date("Y-m-d H:i:s", $week);

        $str_current_time = strtotime($current_time);
        $str_time_week = strtotime($time_week);

        if ($str_current_time > $str_time_week){
          $id = $row_t['id'];
          $sql = "DELETE FROM teacher_bold WHERE id='$id'";
          $result = $mysqli->query($sql);
        }
      }

      $sql_t = "SELECT * FROM teacher_color WHERE 1";
      $result_t = $mysqli->query($sql_t);

      while ($row_t = $result_t->fetch_assoc()){
        $time = $row_t['time'];
        $week = strtotime("+1 week");
        $current_time = date("Y-m-d H:i:s");
        $time_week = date("Y-m-d H:i:s", $week);

        $str_current_time = strtotime($current_time);
        $str_time_week = strtotime($time_week);

        if ($str_current_time > $str_time_week){
          $id = $row_t['id'];
          $item = $row_t['color'];
          $sql = "DELETE FROM teacher_bold WHERE id='$id' and color='$item'";
          $result = $mysqli->query($sql);
        }
      }
    }

    function checkStudentPeriod(){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $sql_s = "SELECT * FROM student_bold WHERE 1";
      $result_s = $mysqli->query($sql_s);

      while ($row_s = $result_s->fetch_assoc()){
        $time = $row_s['time'];
        $week = strtotime("+1 week");
        $current_time = date("Y-m-d H:i:s");
        $time_week = date("Y-m-d H:i:s", $week);

        $str_current_time = strtotime($current_time);
        $str_time_week = strtotime($time_week);

        if ($str_current_time > $str_time_week){
          $id = $row_s['id'];
          $sql = "DELETE FROM student_bold WHERE id='$id'";
          $result = $mysqli->query($sql);
        }
      }

      $sql_s = "SELECT * FROM student_color WHERE 1";
      $result_s = $mysqli->query($sql_s);

      while ($row_s = $result_s->fetch_assoc()){
        $time = $row_s['time'];
        $week = strtotime("+1 week");
        $current_time = date("Y-m-d H:i:s");
        $time_week = date("Y-m-d H:i:s", $week);

        $str_current_time = strtotime($current_time);
        $str_time_week = strtotime($time_week);

        if ($str_current_time > $str_time_week){
          $id = $row_s['id'];
          $item = $row_s['color'];
          $sql = "DELETE FROM student_color WHERE id='$id' and color='$item'";
          $result = $mysqli->query($sql);
        }
      }
    }

    function checkTodayPeriod(){
      include("config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $current_time = date("Y-m-d");

      $sql = "SELECT * FROM today WHERE 1";

      $result = $mysqli->query($sql);

      $row = $result->fetch_assoc();

      if ($row != ""){
        $str_time = strtotime($row['time']);
        $time = date("Y-m-d", $str_time);

        $before = strtotime($time);
        $after = strtotime($current_time);

        if ($after > $before){
          $sql = "DELETE FROM today WHERE 1";
          $result = $mysqli->query($sql);
        }
      }
    }
  }
 ?>
