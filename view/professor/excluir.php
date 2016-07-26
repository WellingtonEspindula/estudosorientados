<?php

  require_once('../../dao/ProfessorDAO.php');

  if (isset($_GET["id"])){
    $id = $_GET["id"];
    $dao = ProfessorDAO::getInstance();
    $dao->delete($id);
  }

  header("Location: index.php");
 ?>
