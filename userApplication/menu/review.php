<head>
  <meta charset="utf-8">
</head>

<?php
  include('SearchController.php');
  session_start();

  $searchController = new SearchController;

  $teacher_id = $_GET['from_id'];
  $student_id = $_SESSION['userId'];
  $type = $_GET['type'];
  $grade = $_POST['star-input'];
  $content = $_POST['review'];

  $searchController->registerReview($teacher_id, $student_id, $type, $grade, $content);
 ?>
