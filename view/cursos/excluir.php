<?php

  require_once('../../dao/CursoDAO.php');

  if (isset($_GET["id"])){
    $id = $_GET["id"];
    $dao = CursoDAO::getInstance();
    $dao->delete($id);
  }

  header("Location: index.php");
 ?>
