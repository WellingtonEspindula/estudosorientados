<?php

  require_once('../../dao/PeriodoDAO.php');

  if (isset($_GET["id"])){
    $id = $_GET["id"];
    $dao = PeriodoDAO::getInstance();
    $dao->delete($id);
  }

  header("Location: index.php");
 ?>
