<?php

require_once('../../dao/EstudoOrientadoDAO.php');
require_once('../../dao/ProfessorDAO.php');
require_once('../../dao/TurmaDAO.php');
require_once('../../dao/CursoDAO.php');
require_once('../../dao/PeriodoDAO.php');

require_once('../../model/EstudoOrientado.php');
require_once('../../model/Professor.php');
require_once('../../model/Turma.php');
require_once('../../model/Curso.php');
require_once('../../model/Periodo.php');

  function getStringProfessor($id)
  {
    $daoProf = ProfessorDAO::getInstance();
    return $daoProf->get($id)->getNome();
  }

  function getStringTurma($id)
  {
    $daoTurma = TurmaDAO::getInstance();
    $daoCurso = CursoDAO::getInstance();
    $turma = $daoTurma->get($id);
    $curso = $daoCurso->get($turma->getCurso());

    return $turma->getNumTurma()." ".$curso->getAbreviatura();
  }

  function getStringCurso($id)
  {
    $daoCurso = CursoDAO::getInstance();
    return $curso = $daoCurso->get($id)->getAbreviatura();
  }

  function getStringPeriodo($id)
  {
    $daoPeriodo = PeriodoDAO::getInstance();
    $periodo = $daoPeriodo->get($id);
    return $periodo->getNumPeriodo()."º da ".$periodo->getTurno();
  }

  function getStringGeneroProf($g){
    if ($g == "M") {
      return "Masculino";
    } elseif ($g == "F") {
      return "Feminino";
    }
  }


  function returnListProf()
  {
    $daoProf = ProfessorDAO::getInstance();
    $objs = $daoProf->getAll();

    foreach ($objs as $obj) {
      echo "<option value='".$obj->getIdProfessor()."'>".$obj->getNome()."</option>";
    }
  }
  function returnListTurma()
  {
    $daoTurma = TurmaDAO::getInstance();
    $objs = $daoTurma->getAll();

    foreach ($objs as $obj) {
      $id = $obj->getIdTurma();
      echo "<option value='".$id."'>".getStringTurma($id)."</option>";

    }
  }
  function returnListPeriodo()
  {
    $daoPeriodo = PeriodoDAO::getInstance();
    $objs = $daoPeriodo->getAll();

    foreach ($objs as $obj) {
      $id = $obj->getIdPeriodo();
      echo "<option value='".$id."'>".getStringPeriodo($id)."</option>";

    }
  }


  function returnListProfSelect($idS)
  {
    $daoProf = ProfessorDAO::getInstance();
    $objs = $daoProf->getAll();

    foreach ($objs as $obj) {
      echo "<option ";
      echo ($obj->getIdProfessor() == $idS) ? "selected " : " ";
      echo "value='".$obj->getIdProfessor()."'>";
      echo $obj->getNome();
      echo "</option>";
    }
  }
  function returnListTurmaSelect($idS)
  {
    $daoTurma = TurmaDAO::getInstance();
    $objs = $daoTurma->getAll();

    foreach ($objs as $obj) {
      $id = $obj->getIdTurma();

      echo "<option ";
      echo ($id == $idS) ? "selected " : " ";
      echo "value='".$id."'>";
      echo getStringTurma($id);
      echo "</option>";

    }
  }
  function returnListPeriodoSelect($idS)
  {
    $daoPeriodo = PeriodoDAO::getInstance();
    $objs = $daoPeriodo->getAll();

    foreach ($objs as $obj) {
      $id = $obj->getIdPeriodo();

      echo "<option ";
      echo ($id == $idS) ? "selected " : " ";
      echo "value='".$id."'>";
      echo getStringPeriodo($id);
      echo "</option>";
    }
  }

 ?>
