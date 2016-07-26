<?php

  class Professor
  {
    private $idProfessor;
    private $nome;
    private $genero;

public function getIdProfessor()
{
return $this->idProfessor;
}
public function setIdProfessor($idProfessor)
{
  $this->idProfessor = $idProfessor;
}
public function getNome()
{
return $this->nome;
}
public function setNome($nome)
{
  $this->nome = $nome;
}
public function getGenero()
{
return $this->genero;
}
public function setGenero($genero)
{
  $this->genero = $genero;
}
}


 ?>
