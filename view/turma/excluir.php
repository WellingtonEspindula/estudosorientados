<?php

  require_once('../../dao/TurmaDAO.php');

  if (isset($_GET["id"])){
    $id = $_GET["id"];
    $dao = TurmaDAO::getInstance();
    $dao->delete($id);
  }

  header("Location: index.php");
 ?>
