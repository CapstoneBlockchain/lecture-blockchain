<?php

  class CoinController{
    function register($id, $position, $item, $coin){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $time = date("Y-m-d H:i:s");

      $sql = "INSERT INTO coin_usage (id, position, item, coin, time)";
      $sql = $sql." VALUES ('$id', '$position', '$item', $coin, '$time')";

      $mysqli->query($sql);
    }


    function load($id, $position, $pageNum){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");
      $minNum = $pageNum * 20;
      $maxNum = $minNum + 20;

      $sql = "SELECT * FROM coin_usage WHERE id = '$id' and position ='$position'
       ORDER BY id DESC LIMIT $minNum, $maxNum";

      $result = $mysqli->query($sql);

      return $result;
    }


    function count($id, $position){
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $sql = "SELECT COUNT(*) AS total FROM coin_usage WHERE id = '$id' and position = '$position'";
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
