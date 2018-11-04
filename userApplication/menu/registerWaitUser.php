<head>
  <meta charset="utf-8">
</head>

<?php
  include('SearchController.php');
  session_start();

  $searchController = new SearchController;

  $to_id = $_GET['to_id'];
  $from_id = $_SESSION['userId'];
  $type = $_GET['type'];

  $searchController->registerWaitUser($to_id, $from_id, $type);

 ?>
