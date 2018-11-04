<head>
  <meta charset="utf-8">
</head>

<?php
  class RequestsController{

    function loadRequest($position, $id, $pageNum){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);

      $minNum = ($pageNum - 1) * 20;
      $maxNum = $minNum + 20;

      if ($position == 'teacher'){
        $sql = "SELECT * FROM wait_request JOIN student ON from_id = id
        WHERE to_id = '$id' and to_position = '$position' ORDER BY to_id DESC LIMIT $minNum, $maxNum";
      } else {
        $sql = "SELECT * FROM wait_request JOIN teacher ON from_id = id
        WHERE to_id = '$id' and to_position = '$position' ORDER BY to_id DESC LIMIT $minNum, $maxNum";
      }

      $result = $mysqli->query($sql);

      if ($result){
        return $result;
      } else {
        return false;
      }
    }

    function clickRequest($position, $id, $pageNum, $userNum){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);

      $minNum = ($pageNum - 1) * 20;
      $maxNum = $minNum + 20;

      if ($position == 'teacher'){
        $sql = "SELECT * FROM wait_request JOIN student ON from_id = id
        WHERE to_id = '$id' and to_position = '$position' ORDER BY to_id DESC LIMIT $minNum, $maxNum";
      } else {
        $sql = "SELECT * FROM wait_request JOIN teacher ON from_id = id
        WHERE to_id = '$id' and to_position = '$position' ORDER BY to_id DESC LIMIT $minNum, $maxNum";
      }

      $userNum = $userNum % 20;
      $i = 1;

      while ($row = $result->fetch_assoc()){
        if ($i == $userNum){
          return $row;
        } else {
          $i = $i + 1;
        }
      }
    }

    function countRequest($id, $position){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);

      $sql = "SELECT COUNT(*) AS total FROM wait_request WHERE to_id = '$id' and to_position = '$position'";

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
