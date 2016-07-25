<?php

  require_once('../../dao/EstudoOrientadoDAO.php');

    $dao = EstudoOrientadoDAO::getInstance();
    $dao->deleteAll();
    header("Location: index.php");
 ?>
