<?php

  class userController{


    function updateTeacher($id, $name, $tel1, $tel2, $tel3
    , $univ, $major, $degree, $career, $course1, $course2
    , $sido1, $gugun1, $sido2, $gugun2, $aboutme){

      if ($name == ""){
        echo '<script type="text/javascript">
              alert("Please insert name");
              history.back();
              </script>';
        return;
      }

      if ($tel1 == "::Choice::" || $tel2 == "" || $tel3 == ""){
        echo '<script type="text/javascript">
              alert("Please insert tel number");
              history.back();
              </script>';
        return;
      }

      if ($univ == "" || $major == "" || $degree == "::Choice::"){
        echo '<script type="text/javascript">
              alert("Please insert Final Education");
              history.back();
              </script>';
        return;
      }

      if ($career == ""){
        echo '<script type="text/javascript">
              alert("Please insert career");
              history.back();
              </script>';
        return;
      }

      if ($course1 == $course2){
        echo '<script type="text/javascript">
              alert("Hope course should not be same");
              history.back();
              </script>';
        return;
      }

      if ($sido1 == $sido2 && $gugun1 == $gugun2){
        echo '<script type="text/javascript">
              alert("Hope area should not be same");
              history.back();
              </script>';
        return;
      }

      if ($aboutme == ""){
        echo '<script type="text/javascript">
              alert("Please insert about me");
              history.back();
              </script>';
        return;
      }

      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');
      $mysqli->set_charset('utf8');
      $insertSql = "UPDATE teacher SET name = '$name', tel1 = '$tel1'
      , tel2 = '$tel2', tel3 = '$tel3', university = '$univ'
      , major = '$major', degree = '$degree', career = '$career'
      , course1 = '$course1', course2 = '$course2'
      , sido1 = '$sido1', gugun1 = '$gugun1'
      , sido2 = '$sido2', gugun2 = '$gugun2', about = '$aboutme'
      WHERE id = '$id'";

      if($mysqli->query($insertSql)){
        echo '<script type="text/javascript">
              alert("Success.");
              location.href="MyPage.php"
              </script>';
      }else{
        echo '<script type="text/javascript">
              alert("Fail.");
              history.back();
              </script>';
      }

    }

    function updateStudent($id, $name, $tel1, $tel2, $tel3, $school
    , $course1, $course2, $sido1, $gugun1, $sido2, $gugun2, $aboutme){

      if ($name == ""){
        echo '<script type="text/javascript">
              alert("Please insert name");
              history.back();
              </script>';
        return;
      }

      if ($tel1 == "::Choice::" || $tel2 == "" || $tel3 == ""){
        echo '<script type="text/javascript">
              alert("Please insert tel number");
              history.back();
              </script>';
        return;
      }

      if ($school == "::Choice::"){
        echo '<script type="text/javascript">
              alert("Please insert school year");
              history.back();
              </script>';
        return;
      }

      if ($course1 == $course2){
        echo '<script type="text/javascript">
              alert("Hope course should not be same");
              history.back();
              </script>';
        return;
      }

      if ($sido1 == $sido2 && $gugun1 == $gugun2){
        echo '<script type="text/javascript">
              alert("Hope area should not be same");
              history.back();
              </script>';
        return;
      }

      if ($aboutme == ""){
        echo '<script type="text/javascript">
              alert("Please insert about me");
              history.back();
              </script>';
        return;
      }

      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');

      $mysqli->set_charset('utf8');
      $insertSql = "UPDATE student SET name = '$name', tel1 = '$tel1'
      , tel2 = '$tel2', tel3 = '$tel3', school = '$school'
      , course1 = '$course1', course2 = '$course2'
      , sido1 = '$sido1', gugun1 = '$gugun1'
      , sido2 = '$sido2', gugun2 = '$gugun2', about = '$aboutme'
      WHERE id = '$id'";

      if($mysqli->query($insertSql)){

        echo '<script type="text/javascript">
              alert("Success.");
              location.href="MyPage.php"
              </script>';
      }else{
        echo '<script type="text/javascript">
              alert("Fail");
              history.back();
              </script>';
      }
    }

  }

 ?>
