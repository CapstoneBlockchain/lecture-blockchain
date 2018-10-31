<?php

  class memberController{

    function registerTeacher($id, $password, $name, $tel1, $tel2, $tel3
    , $univ, $major, $degree, $career, $course1, $course2
    , $sido1, $gugun1, $sido2, $gugun2, $aboutme){

      if ($id == ""){
        echo '<script type="text/javascript">
              alert("Please insert ID");
              history.back();
              </script>';
        return;
      }

      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');

      $checkSql = "SELECT id FROM teacher WHERE id = '".$id."'";
      $result = $mysqli->query($checkSql);

      if($result->fetch_row()){
        echo '<script type="text/javascript">
              alert("Please double check id");
              history.back();
              </script>';
        return;
      }

      if ($password == ""){
        echo '<script type="text/javascript">
              alert("Please insert password");
              history.back();
              </script>';
        return;
      }

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

      $password = password_hash($password, PASSWORD_DEFAULT);

      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');
      $mysqli->set_charset('utf8');
      $insertSql = "INSERT INTO teacher (id, password, name, tel1, tel2, tel3
        , university, major, degree, career, course1, course2
        , sido1, gugun1, sido2, gugun2, about)";
      $insertSql = $insertSql." VALUES('$id', '$password', '$name'
      , '$tel1', '$tel2', '$tel3'
      , '$univ', '$major', '$degree', '$career', '$course1', '$course2'
      , '$sido1', '$gugun1', '$sido2', '$gugun2', '$aboutme')";

      if($mysqli->query($insertSql)){
        echo '<script type="text/javascript">
              alert("Success.");
              location.href="../index.html"
              </script>';
      }else{
        echo '<script type="text/javascript">
              alert("Fail.");

              </script>';
        // history.back();
      }

    }

    function registerStudent($id, $password, $name, $tel1, $tel2, $tel3, $school
    , $course1, $course2, $sido1, $gugun1, $sido2, $gugun2, $aboutme){

      if ($id == ""){
        echo '<script type="text/javascript">
              alert("Please insert ID");
              history.back();
              </script>';
        return;
      }

      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');

      $checkSql = "SELECT id FROM student WHERE id = '".$id."'";
      $result = $mysqli->query($checkSql);

      if($result->fetch_row()){
        echo '<script type="text/javascript">
              alert("Please double check id");
              history.back();
              </script>';
        return;
      }

      if ($password == ""){
        echo '<script type="text/javascript">
              alert("Please insert password");
              history.back();
              </script>';
        return;
      }

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

      $password = password_hash($password, PASSWORD_DEFAULT);

      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');

      $mysqli->set_charset('utf8');
      $insertSql = "INSERT INTO student (id, password, name, tel1, tel2, tel3
        , school, course1, course2, sido1, gugun1, sido2, gugun2, about)";

      $insertSql = $insertSql." VALUES('$id', '$password', '$name'
      , '$tel1', '$tel2', '$tel3', '$school', '$course1', '$course2'
      , '$sido1', '$gugun1', '$sido2', '$gugun2', '$aboutme')";

      if($mysqli->query($insertSql)){
        echo '<script type="text/javascript">
              alert("Success.");
              location.href="../index.html"
              </script>';
      }else{
        echo '<script type="text/javascript">
              alert("Fail");
              history.back();
              </script>';
      }

    }

    function logOut(){
      session_start();
      session_destroy();
      echo("<script>location.replace('../index.html');</script>");
    }

    function logIn_teacher($id, $password){
      session_start();
      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');

      $user_id = $_POST['id'];
      $user_pw = $_POST['password'];

      $sql = "SELECT password, name FROM teacher WHERE id ='".$user_id."'";

      $result = $mysqli->query($sql);

      if($row = $result->fetch_row()){
          //세션에 정보 저장

          if (password_verify($user_pw, $row[0])){
            $_SESSION['userId'] = $_POST['id'];
            $_SESSION['userPossition'] = "teacher";
            $_SESSION['userName'] = $row[1];
            Header("Location:../MainPage.php");
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
      $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');

      $user_id = $_POST['id'];
      $user_pw = $_POST['password'];

      $sql = "SELECT password, name FROM student WHERE id ='".$user_id."'";

      $result = $mysqli->query($sql);

      if($row = $result->fetch_row()){
          //세션에 정보 저장
          if (password_verify($user_pw, $row[0])){
            $_SESSION['userId'] = $_POST['id'];
            $_SESSION['userPossition'] = "student";
            $_SESSION['userName'] = $row[1];
            echo '<script type="text/javascript">
                  alert("Wrong Password.");
                  location.href=""
                  </script>';
            Header("Location:../MainPage.php");
          } else {
            echo '<script type="text/javascript">
                  alert("Wrong Password.");
                  history.back();
                  </script>';
          }
      }else{
        echo '<script type="text/javascript">
              alert("등록되지 않은 아이디거나 잘못된 패스워드를 입력하셨습니다.");
              history.back();
              </script>';
      }
    }

  }

 ?>
