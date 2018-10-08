<?php

    include 'memberController.php';
    $memberController = new LoginController;

    $id = $_POST['id'];

    $memberController->idCheck_student($id);

 ?>
