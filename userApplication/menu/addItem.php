<head>
  <meta charset="utf-8">
</head>

<?php
  session_start();
  include("ItemController.php");

  $itemController = new ItemController;

  $position = $_SESSION['userPossition'];
  $id = $_SESSION['userId'];

  if ($_POST['type'] == "bold"){
    $itemController->registerBold($position, $id);
  } else if ($_POST['type'] == "background"){
    $itemController->registerBackground($position, $id, $_POST['background']);
  } else {
    $itemController->registerToday($id, $_POST['coin']);
  }

 ?>
