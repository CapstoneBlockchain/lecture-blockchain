<head>
  <meta charset="utf-8">
</head>

<?php
  include('SearchController.php');
  session_start();

  $searchController = new SearchController;

  $from_id = $_SESSION['userId'];
  $to_id = $_GET['to_id'];

  $searchController->readingUser($to_id, $from_id, $_GET['pageNum']);
 ?>
