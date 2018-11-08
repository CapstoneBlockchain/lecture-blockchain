<head>
  <meta charset="utf-8">
</head>

<?php
  class RequestsController{

    function loadRequest($position, $id, $pageNum, $type){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);

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

    function completeRequest($teacher_id, $student_id, $type){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);

      $sql = "INSERT INTO complete_request (student_id, teacher_id, type, time)";
      $date = date("Y-m-d H:i:s");
      $sql = $sql." VALUES('$student_id', '$teacher_id', '$type', '$date')";

      $result = $mysqli->query($sql);

      if ($result){
        return $result;
      } else {
        return false;
      }
    }

    function countRequest($id, $position, $type){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);

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
