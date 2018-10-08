<?php

  class memberController{

    function registerUser($id, $password, $name, $tel1, $tel2, $tel3
    , $univ, $major, $degree, $career, $course1, $course2
    , $sido1, $gugun1, $sido2, $gugun2, $aboutme){

        $mysqli = new mysqli('localhost', 'als950901', '1234', 'teacher');
        $mysqli->set_charset('utf8');
        $insertSql = "INSERT INTO member (id, password, name, tel1, tel2, tel3
          , university, career, course1, course2
          , sido1, gugun1, sido2, gugun2, about)";
        $insertSql = $insertSql." VALUES('$id, $password, $name
        , $tel1, $tel2, $tel3
        , $univ, $major, $degree, $career, $course1, $course2
        , $sido1, $gugun1, $sido2, $gugun2, $aboutme
        ')";

        if($mysqli->query($insertSql)){

        }else{
          
        }
    }
    function idCheck($id){
      $mysqli = new mysqli('localhost', 'als950901', 'dlstlr1234', 'als950901');

      $checkSql = "SELECT id FROM user WHERE id = '".$id."'";
      $result = $mysqli->query($checkSql);

      if($result->fetch_row()){
        //실패
        echo "중복된 아이디입니다. 다른 아이디로 가입해주세요.";
      }else{
        //성공
        echo "사용가능한 아이디입니다.";
      }
      $mysqli->close();
    }
    function checkLogin(){
      session_start();
      if(isset($_SESSION['userId']) && isset($_SESSION['userPassword'])){
          //로그인 하면 트루
          return true;
      }else{
          //로그인 안했으면 false
          return false;
      }

    }
    function logOut(){
      session_start();
      session_destroy();
      echo("<script>location.replace('../index.php');</script>");
    }


    function logIn(){
      session_start();
      $mysqli = new mysqli('localhost', 'als950901', 'dlstlr1234', 'als950901');

      $user_id = $_POST['userId'];
      $user_pw = $_POST['userPassword'];

      $sql = "SELECT * FROM user WHERE id ='".$user_id."' and password = '".$user_pw."'";

      $result = $mysqli->query($sql);

      if($result->fetch_row()){
          //세션에 정보 저장
          $_SESSION['userId'] = $_POST['userId'];
          $_SESSION['userPassword'] = $_POST['userPassword'];
          Header("Location:../index.php");
      }else{
        echo '<script type="text/javascript">
              alert("등록되지 않은 아이디거나 잘못된 패스워드를 입력하셨습니다.");
              history.back();
              </script>';
      }
    }
    function getUserAddress(){
      if($this->checkLogin()){
        $mysqli = new mysqli('localhost', 'als950901', 'dlstlr1234', 'als950901');
         $mysqli->set_charset('utf8');
        $userId = $_SESSION['userId'];
        $sql = "SELECT zipCode, address, detailAddress FROM user WHERE id = '".$userId."'";
        $result = $mysqli->query($sql);
        if ($result) {
          return $result;
        }else{
          return false;
        }

      }
    }
  }




 ?>
