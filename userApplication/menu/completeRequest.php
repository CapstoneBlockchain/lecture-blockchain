<head>
  <meta charset="utf-8">
</head>

<?php
  include('RequestsController.php');
  session_start();

  $requestsController = new RequestsController;

  $requestsController->deleteWaitRequest();

  if ($_SESSION['userPossition'] == 'teacher'){
    $teacher_id = $_SESSION['userId'];
    $student_id = $_GET['from_id'];
  } else {
    $teacher_id = $_GET['from_id'];
    $student_id = $_SESSION['userId'];
  }

  $type = $_GET['type'];

  $requestsController->completeRequest($teacher_id, $student_id, $type);
 ?>
