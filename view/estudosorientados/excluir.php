<?php

  require_once('../../dao/EstudoOrientadoDAO.php');

  if (isset($_GET["id"])){
    $id = $_GET["id"];
    $dao = EstudoOrientadoDAO::getInstance();
    $dao->delete($id);
  }

  header("Location: index.php");
 ?>
