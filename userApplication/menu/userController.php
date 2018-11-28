<?php

  class userController{


    function updateTeacher($id, $name, $tel1, $tel2, $tel3
    , $univ, $major, $degree, $career, $course1, $course2
    , $sido1, $gugun1, $sido2, $gugun2, $aboutme){

      if ($name == ""){
        echo '<script type="text/javascript">
              alert("이름을 입력해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($tel1 == "::Choice::" || $tel2 == "" || $tel3 == ""){
        echo '<script type="text/javascript">
              alert("전화번호를 입력해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($univ == "" || $major == "" || $degree == "::Choice::"){
        echo '<script type="text/javascript">
              alert("최종 학력을 입력해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($career == ""){
        echo '<script type="text/javascript">
              alert("경력을 입력해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($course1 == "" || $course2 == ""){
        echo '<script type="text/javascript">
              alert("희망 과목을 선택해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($course1 == $course2){
        echo '<script type="text/javascript">
              alert("중복된 희망 과목을 선택하셨습니다.");
              history.back();
              </script>';
        return;
      }

      if ($sido1 == $sido2 && $gugun1 == $gugun2){
        echo '<script type="text/javascript">
              alert("중복된 희망 지역을 선택하셨습니다.");
              history.back();
              </script>';
        return;
      }

      if ($aboutme == ""){
        echo '<script type="text/javascript">
              alert("자기소개를 입력해주세요.");
              history.back();
              </script>';
        return;
      }

      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

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
              alert("회원정보 수정을 성공하였습니다.");
              location.href="MyPage.php"
              </script>';
      }else{
        echo '<script type="text/javascript">
              alert("회원정보 수정을 실패하였습니다.");
              history.back();
              </script>';
      }

    }

    function updateStudent($id, $name, $tel1, $tel2, $tel3, $school
    , $course1, $course2, $sido1, $gugun1, $sido2, $gugun2, $aboutme){

      if ($name == ""){
        echo '<script type="text/javascript">
              alert("이름을 입력해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($tel1 == "::Choice::" || $tel2 == "" || $tel3 == ""){
        echo '<script type="text/javascript">
              alert("전화번호를 입력해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($school == "::Choice::"){
        echo '<script type="text/javascript">
              alert("학교를 입력해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($course1 == "" || $course2 == ""){
        echo '<script type="text/javascript">
              alert("희망 과목을 선택해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($course1 == $course2){
        echo '<script type="text/javascript">
              alert("중복된 희망 과목을 선택하셨습니다.");
              history.back();
              </script>';
        return;
      }

      if ($sido1 == $sido2 && $gugun1 == $gugun2){
        echo '<script type="text/javascript">
              alert("중복된 희망 지역을 선택하셨습니다.");
              history.back();
              </script>';
        return;
      }

      if ($aboutme == ""){
        echo '<script type="text/javascript">
              alert("자기소개를 입력해주세요.");
              history.back();
              </script>';
        return;
      }
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $mysqli->set_charset('utf8');
      $insertSql = "UPDATE student SET name = '$name', tel1 = '$tel1'
      , tel2 = '$tel2', tel3 = '$tel3', school = '$school'
      , course1 = '$course1', course2 = '$course2'
      , sido1 = '$sido1', gugun1 = '$gugun1'
      , sido2 = '$sido2', gugun2 = '$gugun2', about = '$aboutme'
      WHERE id = '$id'";

      if($mysqli->query($insertSql)){

        echo '<script type="text/javascript">
              alert("회원정보 수정을 성공하였습니다.");
              location.href="MyPage.php"
              </script>';
      }else{
        echo '<script type="text/javascript">
              alert("회원정보 수정을 실패하였습니다.");
              history.back();
              </script>';
      }
    }

  }

 ?>
