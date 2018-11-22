<head>
  <meta charset="utf-8">
</head>

<?php
  include('memberController.php');

  $id = $_POST['id'];
  $password = $_POST['password'];

  $memberController = new memberController;

  $memberController->logIn_student($id, $password);

  echo '<script src="TokenWeb3.js" charset="utf-8"></script>
        <script charset="utf-8">init();</script>
        <script charset="utf-8">getUserToken();</script>';
 ?>
