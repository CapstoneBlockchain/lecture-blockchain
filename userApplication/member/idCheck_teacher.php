<?php

    include 'memberController.php';
    $memberController = new memberController;

    $id = $_POST['id'];

    $memberController->idCheck_teacher($id);

 ?>
