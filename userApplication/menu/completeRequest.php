<head>
  <meta charset="utf-8">
</head>

<?php
  include('RequestsController.php');
  session_start();

  $requestsController = new RequestsController;

  $type = $_GET['type'];

  $requestsController->deleteWaitRequest($_SESSION['userId'], $_GET['from_id'], $type, $_SESSION['userPossition']);

  if ($_SESSION['userPossition'] == 'teacher'){
    $teacher_id = $_SESSION['userId'];
    $student_id = $_GET['from_id'];
  } else {
    $teacher_id = $_GET['from_id'];
    $student_id = $_SESSION['userId'];
  }

  $requestsController->completeRequest($teacher_id, $student_id, $type);
 ?>
