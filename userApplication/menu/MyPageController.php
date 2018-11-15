<head>
  <meta charset="utf-8">
</head>

<?php
  class MyPageController{
    function loadUser($position,$id, $pageNum){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $minNum = $pageNum * 20;
      $maxNum = $minNum + 20;

      // 학생일 경우 선생 table과, 선생일 경우 학생 table과 join 된다.
      if($position == 'teacher'){
        $sql = "SELECT * FROM student JOIN complete_request ON id=student_id WHERE teacher_id='$id' ORDER BY id DESC LIMIT $minNum, $maxNum";
      }
      else{
        $sql = "SELECT * FROM teacher JOIN complete_request ON id=teacher_id WHERE student_id='$id' ORDER BY id DESC LIMIT $minNum, $maxNum";
      }

      $result = $mysqli->query($sql);

      if ($result){
        return $result;
      } else {
        return false;
      }
    }

    function clickUser($position,$id,$pageNum, $userNum){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $minNum = $pageNum * 20;
      $maxNum = $minNum + 20;

      if($position == 'teacher'){
        $sql = "SELECT * FROM teacher JOIN complete_request ON id=teacher_id WHERE student_id='$id' ORDER BY id DESC LIMIT $minNum, $maxNum";
      }
      else{
        $sql = "SELECT * FROM student JOIN complete_request ON id=student_id WHERE teacher_id='$id' ORDER BY id DESC LIMIT $minNum, $maxNum";
      }

      $result = $mysqli->query($sql);

      $userNum = $userNum % 20;
      $i = 0;

      while ($row = $result->fetch_assoc()){
        if ($i == $userNum){
          return $row;
        } else {
          $i = $i + 1;
        }
      }
    }

    function countUser($position){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $id = $_SESSION['userId'];

      if ($_SESSION['userPossition'] == 'teacher'){
        $sql = "SELECT COUNT(*) AS total FROM $position WHERE teacher_id = '$id'";
      } else {
        $sql = "SELECT COUNT(*) AS total FROM $position WHERE student_id = '$id'";
      }

      $result = $mysqli->query($sql);
      if ($result){
        $row = $result->fetch_assoc();
        return $row['total'];
      } else {
        return false;
      }
    }
  }
 ?>
