<?php

  class memberController{

    function registerTeacher($id, $password, $name, $tel1, $tel2, $tel3
    , $univ, $major, $degree, $career, $course1, $course2
    , $sido1, $gugun1, $sido2, $gugun2, $aboutme, $pub_key, $gender, $isCheck){

      if ($id == ""){
        echo '<script type="text/javascript">
              alert("ID를 입력해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($isCheck == 0){
        echo '<script type="text/javascript">
              alert("Key Check를 눌러주세요.");
              history.back();
              </script>';
        return;
      }

      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $checkSql = "SELECT id FROM teacher WHERE id = '".$id."'";
      $result = $mysqli->query($checkSql);

      if($result->fetch_row()){
        echo '<script type="text/javascript">
              alert("ID가 중복되었습니다.");
              history.back();
              </script>';
        return;
      }

      if ($password == ""){
        echo '<script type="text/javascript">
              alert("비밀번호를 입력해주세요.");
              history.back();
              </script>';
        return;
      }

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

      if ($gender == ""){
        echo '<script type="text/javascript">
              alert("성별을 선택해주세요.");
              history.back();
              </script>';
        return;
      }

      $password = password_hash($password, PASSWORD_DEFAULT);

      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $mysqli->set_charset('utf8');

      $insertSql = "INSERT INTO metamask (pub_key)";
      $insertSql = $insertSql." VALUES('$pub_key')";

      if ($mysqli->query($insertSql)){
        $insertSql = "INSERT INTO teacher (id, password, name, tel1, tel2, tel3
          , university, major, degree, career, course1, course2
          , sido1, gugun1, sido2, gugun2, about, pub_key, gender)";
        $insertSql = $insertSql." VALUES('$id', '$password', '$name'
        , '$tel1', '$tel2', '$tel3'
        , '$univ', '$major', '$degree', '$career', '$course1', '$course2'
        , '$sido1', '$gugun1', '$sido2', '$gugun2', '$aboutme', '$pub_key', '$gender')";

        if ($mysqli->query($insertSql)){
          echo "<script src='https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js'></script>";
          echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
          echo '<script type="text/javascript" src="../TokenWeb3.js">
                </script>';
          echo '<script type="text/javascript">
                  newMember();
                </script>';
        } else {
          echo '<script type="text/javascript">
                alert("회원 가입에 실패하셨습니다.");
                history.back();
                </script>';
        }
      } else {
        echo '<script type="text/javascript">
              alert("중복된 Key를 입력하셨습니다.");
              history.back();
              </script>';
      }
    }

    function registerStudent($id, $password, $name, $tel1, $tel2, $tel3, $school
    , $course1, $course2, $sido1, $gugun1, $sido2, $gugun2, $aboutme, $pub_key, $gender, $isCheck){

      if ($id == ""){
        echo '<script type="text/javascript">
              alert("ID를 입력해주세요.");
              history.back();
              </script>';
        return;
      }

      if ($isCheck == 0){
        echo '<script type="text/javascript">
              alert("Key Check를 눌러주세요.");
              history.back();
              </script>';
        return;
      }

      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $checkSql = "SELECT id FROM student WHERE id = '".$id."'";
      $result = $mysqli->query($checkSql);

      if($result->fetch_row()){
        echo '<script type="text/javascript">
              alert("ID가 중복되었습니다.");
              history.back();
              </script>';
        return;
      }

      if ($password == ""){
        echo '<script type="text/javascript">
              alert("비밀번호를 입력해주세요.");
              history.back();
              </script>';
        return;
      }

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

      if ($gender == ""){
        echo '<script type="text/javascript">
              alert("성별을 선택해주세요.");
              history.back();
              </script>';
        return;
      }

      $password = password_hash($password, PASSWORD_DEFAULT);

      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $mysqli->set_charset('utf8');

      $insertSql = "INSERT INTO metamask (pub_key)";
      $insertSql = $insertSql." VALUES('$pub_key')";

      if ($mysqli->query($insertSql)){
        $insertSql = "INSERT INTO student (id, password, name, tel1, tel2, tel3
          , school, course1, course2, sido1, gugun1, sido2, gugun2, about, pub_key, gender)";

          $insertSql = $insertSql." VALUES('$id', '$password', '$name'
          , '$tel1', '$tel2', '$tel3', '$school', '$course1', '$course2'
          , '$sido1', '$gugun1', '$sido2', '$gugun2', '$aboutme', '$pub_key', '$gender')";

          if ($mysqli->query($insertSql)){
            echo "<script src='https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js'></script>";
            echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
            echo '<script type="text/javascript" src="../TokenWeb3.js"></script>';
            echo '<script type="text/javascript">
                  newMember();
                  </script>';
          } else {
            echo '<script type="text/javascript">
                  alert("회원 가입에 실패하셨습니다.");
                  history.back();
                  </script>';
          }

      } else {
        echo '<script type="text/javascript">
              alert("중복된 Key를 입력하셨습니다.");
              history.back();
              </script>';
      }


    }

    function logOut(){
      session_start();
      session_destroy();
      echo("<script>location.replace('../index.html');</script>");
    }

    function logIn_teacher($id, $password, $metamask){
      session_start();
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $user_id = $_POST['id'];
      $user_pw = $_POST['password'];

      $sql = "SELECT password, name, pub_key FROM teacher WHERE id ='$user_id'";

      $result = $mysqli->query($sql);

      if($row = $result->fetch_row()){
          //세션에 정보 저장

          $load_metamask = "'".$row[2]."'";

          echo '<script type="text/javascript">
                alert("'.$metamask.'");
                history.back();
                </script>';

          if (password_verify($user_pw, $row[0])){

            if (strcmp($metamask, $load_metamask)){
              $_SESSION['userId'] = $_POST['id'];
              $_SESSION['userPossition'] = "teacher";
              $_SESSION['userName'] = $row[1];
              echo '<script type="text/javascript">
                    alert("계정의 Key와 브라우저의 Key가 일치하지 않습니다.");
                    location.href="../MainPage.php";
                    </script>';
            } else {
              echo '<script type="text/javascript">
                    alert("계정의 Key와 브라우저의 Key가 일치하지 않습니다.");
                    history.back();
                    </script>';
            }
          } else {
            echo '<script type="text/javascript">
                  alert("잘못된 비밀번호입니다.");
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

    function logIn_student($id, $password, $metamask){
      session_start();
      include("../config.php");

      $mysqli = new mysqli($IP, $NAME, $PASSWORD, $DB);
      $mysqli->query("SET NAMES utf8");

      $user_id = $_POST['id'];
      $user_pw = $_POST['password'];

      $sql = "SELECT password, name, pub_key FROM student WHERE id ='$user_id'";

      $result = $mysqli->query($sql);

      if($row = $result->fetch_row()){
          //세션에 정보 저장

          $load_metamask = "'".$row[2]."'";

          echo '<script type="text/javascript">
                alert("'.$metamask.'");
                history.back();
                </script>';

          if (password_verify($user_pw, $row[0])){
            if (strcmp($metamask, $load_metamask)){
              $_SESSION['userId'] = $_POST['id'];
              $_SESSION['userPossition'] = "student";
              $_SESSION['userName'] = $row[1];
              echo '<script type="text/javascript">
                    alert("계정의 Key와 브라우저의 Key가 일치하지 않습니다.");
                    location.href="../MainPage.php";
                    </script>';
            } else {
              echo '<script type="text/javascript">
                    alert("계정의 Key와 브라우저의 Key가 일치하지 않습니다.");
                    history.back();
                    </script>';
            }
          } else {
            echo '<script type="text/javascript">
                  alert("잘못된 비밀번호입니다.");
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

  }

 ?>
