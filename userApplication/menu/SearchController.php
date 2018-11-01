<head>
  <meta charset="utf-8">
</head>

<?php
  class SearchController{

    function loadUser($position, $pageNum){
      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');
      $minNum = ($pageNum - 1) * 20;
      $maxNum = $minNum + 20;

      $sql = "SELECT * FROM $position WHERE 1 ORDER BY id DESC LIMIT $minNum, $maxNum";

      $result = $mysqli->query($sql);

      if ($result){
        return $result;
      } else {
        return false;
      }
    }

    function clickUser($position, $pageNum, $userNum){
      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');
      $minNum = $pageNum * 20;
      $maxNum = $minNum + 20;

      $sql = "SELECT * FROM $position WHERE 1 ORDER BY id DESC LIMIT $minNum, $maxNum";

      $result = $mysqli->query($sql);

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

    function countUser($position){
      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');
      $sql = "SELECT COUNT(*) AS total FROM $position WHERE 1";

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
