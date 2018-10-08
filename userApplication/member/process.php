<head>
  <meta charset="utf-8">
</head>

<?php
  include('memberController.php');


  $id = $_POST['id'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $tel1 = $_POST['tel1'];
  $tel2 = $_POST['tel2'];
  $tel3 = $_POST['tel3'];
  $univ = $_POST['university'];
  $major = $_POST['major'];
  $degree = $_POST['education'];
  $career = $_POST['career'];
  $course1 = $_POST['course1'];
  $course2 = $_POST['course2'];
  $sido1 = $_POST['sido1'];
  $gugun1 = $_POST['gugun1'];
  $sido2 = $_POST['sido2'];
  $gugun2 = $_POST['gugun2'];
  $aboutme = $_POST['aboutme'];

  $memberController = new memberController;

  $memberController->registerUser($id, $password, $name, $tel1, $tel2, $tel3
  , $univ, $major, $degree, $career, $course1, $course2
  , $sido1, $gugun1, $sido2, $gugun2, $aboutme);

 ?>
