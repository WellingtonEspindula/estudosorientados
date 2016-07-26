<?php
/**
 *
 */
class Turma
{
  private $idTurma;
  private $ano;
  private $numTurma;
  private $curso;



public function getIdTurma()
{
return $this->idTurma;
}
public function setIdTurma($idTurma)
{
  $this->idTurma = $idTurma;
}

public function getAno()
{
return $this->ano;
}
public function setAno($ano)
{
  $this->ano = $ano;
}
public function getNumTurma()
{
return $this->numTurma;
}
public function setNumTurma($numTurma)
{
  $this->numTurma = $numTurma;
}
public function getCurso()
{
return $this->curso;
}
public function setCurso($curso)
{
  $this->curso = $curso;
}

}
 ?>
