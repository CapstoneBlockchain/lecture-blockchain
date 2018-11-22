<head>
  <meta charset="utf-8">
</head>

<?php
  class RequestsController{

    function loadRequest($position, $id, $pageNum, $type){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $minNum = $pageNum * 20;
      $maxNum = $minNum + 20;

      if ($position == 'teacher'){
        $sql = "SELECT * FROM wait_request JOIN student ON from_id = id
        WHERE to_id = '$id' and to_position = '$position' and type = '$type' ORDER BY to_id DESC LIMIT $minNum, $maxNum";
      } else {
        $sql = "SELECT * FROM wait_request JOIN teacher ON from_id = id
        WHERE to_id = '$id' and to_position = '$position' and type = '$type' ORDER BY to_id DESC LIMIT $minNum, $maxNum";
      }

      $result = $mysqli->query($sql);

      if ($result){
        return $result;
      } else {
        return false;
      }
    }

    function clickRequest($position, $id, $pageNum, $userNum, $type){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $minNum = $pageNum * 20;
      $maxNum = $minNum + 20;

      if ($position == 'teacher'){
        $sql = "SELECT * FROM wait_request JOIN student ON from_id = id
        WHERE to_id = '$id' and to_position = '$position' and type = '$type' ORDER BY to_id DESC LIMIT $minNum, $maxNum";
      } else {
        $sql = "SELECT * FROM wait_request JOIN teacher ON from_id = id
        WHERE to_id = '$id' and to_position = '$position' and type = '$type' ORDER BY to_id DESC LIMIT $minNum, $maxNum";
      }

      $userNum = $userNum % 20;
      $i = 0;

      $result = $mysqli->query($sql);

      while ($row = $result->fetch_assoc()){
        if ($i == $userNum){
          return $row;
        } else {
          $i = $i + 1;
        }
      }
    }

    function deleteWaitRequest($to_id, $from_id, $type, $to_position){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $sql = "DELETE FROM wait_request WHERE to_id = '$to_id' and from_id = '$from_id' and type = '$type' and to_position = '$to_position'";

      $result = $mysqli->query($sql);

      if ($result){
        echo '<script type="text/javascript">
              alert("Success.");
              location.href="Requests.php";
              </script>';
      } else {
        return false;
      }
    }

    function completeRequest($teacher_id, $student_id,$position, $type){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $sql = "INSERT INTO complete_request (student_id, teacher_id, type, time)";
      $date = date("Y-m-d H:i:s");
      $sql = $sql." VALUES('$student_id', '$teacher_id', '$type', '$date')";

      $result = $mysqli->query($sql);

      if ($position == "teacher"){
        $sql_t = "SELECT * FROM teacher WHERE id = '$teacher_id'";
        $result_t = $mysqli->query($sql_t);
        $row_t = $result_t->fetch_assoc();
      } else {
        $sql_t = "SELECT * FROM student WHERE id = '$student_id'";
        $result_t = $mysqli->query($sql_t);
        $row_t = $result_t->fetch_assoc();
      }

      if ($result){
        $pub_key = $row_t['pub_key'];
        echo "<script src='https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js'></script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
        echo '<script type="text/javascript" src="../TokenWeb3.js"></script>';
        echo '<script type="text/javascript">
              alert("Success.");
              reward('.$pub_key.', '.$type.');
              </script>';
      } else {
        echo '<script type="text/javascript">
              alert("Fail.");
              </script>';
      }
    }

    function countRequest($id, $position, $type){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $sql = "SELECT COUNT(*) AS total FROM wait_request WHERE to_id = '$id' and to_position = '$position' and type = '$type'";

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
