<head>
  <meta charset="utf-8">
</head>

<?php
  include('memberController.php');

  $id = $_POST['id'];
  $password = $_POST['password'];
  $metamask = "'".$_POST['metamask']."'";

  $memberController = new memberController;

  $memberController->logIn_teacher($id, $password, $metamask);
 ?>
