<head>
  <meta charset="utf-8">
</head>

<?php
  include('userController.php');

  $userController = new userController;
  session_start();

  $id = $_SESSION['userId'];
  $name = $_POST['name'];
  $tel1 = $_POST['tel1'];
  $tel2 = $_POST['tel2'];
  $tel3 = $_POST['tel3'];

  if ($_SESSION['userPossition'] == 'student'){
    $school = $_POST['school'];
  } else {
    $univ = $_POST['university'];
    $major = $_POST['major'];
    $degree = $_POST['degree'];
    $career = $_POST['career'];
  }

  $course1 = $_POST['course1'];
  $course2 = $_POST['course2'];
  $sido1 = $_POST['sido1'];
  $sido2 = $_POST['sido2'];
  $gugun1 = $_POST['gugun1'];
  $gugun2 = $_POST['gugun2'];
  $aboutme = $_POST['aboutme'];

  if ($_SESSION['userPossition'] == 'teacher'){
    $userController->updateTeacher($id, $name, $tel1, $tel2, $tel3
    , $univ, $major, $degree, $career, $course1, $course2
    , $sido1, $gugun1, $sido2, $gugun2, $aboutme);
  } else {
    $userController->updateStudent($id, $name, $tel1, $tel2, $tel3, $school
    , $course1, $course2, $sido1, $gugun1, $sido2, $gugun2, $aboutme);
  }
 ?>
