<?php

class EstudoOrientado
{
  private $idEO;
  private $professor;
  private $turma;
  private $periodo;
  private $diaDaSemana;


public function getIdEO()
{
return $this->idEO;
}
public function setIdEO($idEO)
{
  $this->idEO = $idEO;
}
public function getProfessor()
{
return $this->professor;
}
public function setProfessor($professor)
{
  $this->professor = $professor;
}
public function getTurma()
{
return $this->turma;
}
public function setTurma($turma)
{
  $this->turma = $turma;
}
public function getPeriodo()
{
return $this->periodo;
}
public function setPeriodo($periodo)
{
  $this->periodo = $periodo;
}
public function getDiaDaSemana()
{
return $this->diaDaSemana;
}
public function setDiaDaSemana($diaDaSemana)
{
  $this->diaDaSemana = $diaDaSemana;
}
}

 ?>
