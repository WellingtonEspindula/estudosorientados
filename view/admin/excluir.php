<?php

  require_once('../../dao/AdminDAO.php');

  if (isset($_GET["id"])){
    $id = $_GET["id"];
    $dao = AdminDAO::getInstance();
    $dao->delete($id);
  }

  header("Location: index.php");
 ?>
