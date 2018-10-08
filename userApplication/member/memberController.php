<?php

  class memberController{

    function registerTeacher($id, $password, $name, $tel1, $tel2, $tel3
    , $univ, $major, $degree, $career, $course1, $course2
    , $sido1, $gugun1, $sido2, $gugun2, $aboutme){

      if ($id == ""){
        echo '<script type="text/javascript">
              alert("Please insert ID");
              </script>';
        return;
      }

      $mysqli = new mysqli('localhost', 'capstone', '1234', 'teacher');

      $checkSql = "SELECT id FROM teacher WHERE id = '".$id."'";
      $result = $mysqli->query($checkSql);

      if($result->fetch_row()){
        echo '<script type="text/javascript">
              alert("Please double check id");
              </script>';
        return;
      }

      if ($password == ""){
        echo '<script type="text/javascript">
              alert("Please insert password");
              </script>';
        return;
      }

      if ($name == ""){
        echo '<script type="text/javascript">
              alert("Please insert name");
              </script>';
        return;
      }

      if ($tel1 == "::Choice::" || $tel2 == "" || $tel3 == ""){
        echo '<script type="text/javascript">
              alert("Please insert tel number");
              </script>';
        return;
      }

      if ($univ == "" || $major == "" || $degree == "::Choice::"){
        echo '<script type="text/javascript">
              alert("Please insert Final Education");
              </script>';
        return;
      }

      if ($career == ""){
        echo '<script type="text/javascript">
              alert("Please insert career");
              </script>';
        return;
      }

      if ($course1 == $course2){
        echo '<script type="text/javascript">
              alert("Hope course should not be same");
              </script>';
        return;
      }

      if ($sido1 == $sido2 && $gugun1 == $gugun2){
        echo '<script type="text/javascript">
              alert("Hope area should not be same");
              </script>';
        return;
      }

      if ($aboutme == ""){
        echo '<script type="text/javascript">
              alert("Please insert about me");
              </script>';
        return;
      }

      $password = password_hash($password, PASSWORD_DEFAULT);
      var_dump($password);

      $mysqli = new mysqli('localhost', 'capstone', '1234', 'teacher');
      $mysqli->set_charset('utf8');
      $insertSql = "INSERT INTO teacher (id, password, name, tel1, tel2, tel3
        , university, career, course1, course2
        , sido1, gugun1, sido2, gugun2, about)";
      $insertSql = $insertSql." VALUES('$id, $password, $name
      , $tel1, $tel2, $tel3
      , $univ, $major, $degree, $career, $course1, $course2
      , $sido1, $gugun1, $sido2, $gugun2, $aboutme
      ')";

      if($mysqli->query($insertSql)){
        echo '<script type="text/javascript">
              alert("Success.");
              </script>';
      }else{
        echo '<script type="text/javascript">
              alert("Fail");
              </script>';
      }

      Header("Location:../index.html");
    }

    function registerStudent($id, $password, $name, $tel1, $tel2, $tel3, $school
    , $course1, $course2, $sido1, $gugun1, $sido2, $gugun2, $aboutme){

      if ($id == ""){
        alert("Please insert ID");
        return;
      }

      $mysqli = new mysqli('localhost', 'capstone', '1234', 'teacher');

      $checkSql = "SELECT id FROM teacher WHERE id = '".$id."'";
      $result = $mysqli->query($checkSql);

      if($result->fetch_row()){
        echo '<script type="text/javascript">
              alert("Please double check id");
              </script>';
        return;
      }

      if ($password == ""){
        echo '<script type="text/javascript">
              alert("Please insert password");
              </script>';
        return;
      }

      if ($name == ""){
        echo '<script type="text/javascript">
              alert("Please insert name");
              </script>';
        return;
      }

      if ($tel1 == "::Choice::" || $tel2 == "" || $tel3 == ""){
        echo '<script type="text/javascript">
              alert("Please insert tel number");
              </script>';
        return;
      }

      if ($school == "::Choice::"){
        echo '<script type="text/javascript">
              alert("Please insert school year");
              </script>';
        return;
      }

      if ($course1 == $course2){
        echo '<script type="text/javascript">
              alert("Hope course should not be same");
              </script>';
        return;
      }

      if ($sido1 == $sido2 && $gugun1 == $gugun2){
        echo '<script type="text/javascript">
              alert("Hope area should not be same");
              </script>';
        return;
      }

      if ($aboutme == ""){
        echo '<script type="text/javascript">
              alert("Please insert about me");
              </script>';
        return;
      }

      $password = password_hash($password, PASSWORD_DEFAULT);
      var_dump($password);

      $mysqli = new mysqli('localhost', 'capstone', '1234', 'student');

      $mysqli->set_charset('utf8');
      $insertSql = "INSERT INTO student (id, password, name, tel1, tel2, tel3
        , school, course1, course2, sido1, gugun1, sido2, gugun2, about)";

      $insertSql = $insertSql." VALUES('$id, $password, $name
      , $tel1, $tel2, $tel3, $school, $course1, $course2
      , $sido1, $gugun1, $sido2, $gugun2, $about')";

      if($mysqli->query($insertSql)){
        echo '<script type="text/javascript">
              alert("Success.");
              </script>';
      }else{
        echo '<script type="text/javascript">
              alert("Fail");
              </script>';
      }

      Header("Location:../index.html");
    }

    function idCheck_teacher($id){
      $mysqli = new mysqli('localhost', 'capstone', '1234', 'teacher');

      $checkSql = "SELECT id FROM teacher WHERE id = '".$id."'";
      $result = $mysqli->query($checkSql);

      if($result->fetch_row()){
        //실패
        echo '<script type="text/javascript">
              alert("Fail");
              </script>';
      }else{
        //성공
        echo '<script type="text/javascript">
              alert("Success.");
              </script>';
      }
      $mysqli->close();
    }

    function idCheck_student($id){
      $mysqli = new mysqli('localhost', 'capstone', '1234', 'student');

      $checkSql = "SELECT id FROM student WHERE id = '".$id."'";
      $result = $mysqli->query($checkSql);

      if($result->fetch_row()){
        //실패
        echo '<script type="text/javascript">
              alert("Fail");
              </script>';
      }else{
        //성공
        echo '<script type="text/javascript">
              alert("Success.");
              </script>';
      }
      $mysqli->close();
    }

    function logOut(){
      session_start();
      session_destroy();
      echo("<script>location.replace('../index.html');</script>");
    }

    function logIn_teacher($id, $password){
      session_start();
      $mysqli = new mysqli('localhost', 'capstone', '1234', 'teacher');

      $user_id = $_POST['id'];
      $user_pw = $_POST['password'];

      $sql = "SELECT password FROM teacher WHERE id ='".$user_id."'";

      $result = $mysqli->query($sql);

      if($result->fetch_row()){
          //세션에 정보 저장

          if (password_verify($user_pw, $result[0])){
            $_SESSION['userId'] = $_POST['id'];
            $_SESSION['userPassword'] = $_POST['password'];
            Header("Location:../MainPage.html");
          } else {
            echo '<script type="text/javascript">
                  alert("Wrong Password.");
                  history.back();
                  </script>';
          }
      }else{
        echo '<script type="text/javascript">
              alert("등록되지 않은 아이디입니다.");
              history.back();
              </script>';
      }
    }

    function logIn_student($id, $password){
      session_start();
      $mysqli = new mysqli('localhost', 'capstone', '1234', 'teacher');

      $user_id = $_POST['id'];
      $user_pw = $_POST['password'];

      $sql = "SELECT password FROM student WHERE id ='".$user_id."'";

      $result = $mysqli->query($sql);

      if($result->fetch_row()){
          //세션에 정보 저장
          if (password_verify($user_pw, $result[0])){
            $_SESSION['userId'] = $_POST['id'];
            $_SESSION['userPassword'] = $_POST['password'];
            Header("Location:../MainPage.html");
          } else {
            echo '<script type="text/javascript">
                  alert("Wrong Password.");
                  history.back();
                  </script>';
      }else{
        echo '<script type="text/javascript">
              alert("등록되지 않은 아이디거나 잘못된 패스워드를 입력하셨습니다.");
              history.back();
              </script>';
      }
    }

  }

 ?>
