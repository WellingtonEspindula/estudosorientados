<?php

class Curso
{
  private $idCurso;
  private $nome;
  private $abreviatura;

public function getIdCurso()
{
return $this->idCurso;
}
public function setIdCurso($idCurso)
{
  $this->idCurso = $idCurso;
}
public function getNome()
{
return $this->nome;
}
public function setNome($nome)
{
  $this->nome = $nome;
}
public function getAbreviatura()
{
return $this->abreviatura;
}
public function setAbreviatura($abreviatura)
{
  $this->abreviatura = $abreviatura;
}
}

 ?>
