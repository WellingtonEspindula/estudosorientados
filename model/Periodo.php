<?php

class Periodo
{
  private $idPeriodo;
  private $inicio;
  private $fim;
  private $turno;
  private $numPeriodo;

 public function getIdPeriodo()
 {
   return $this->idPeriodo;
 }
 public function setIdPeriodo($idPeriodo)
 {
   $this->idPeriodo = $idPeriodo;
 }
 public function getInicio()
 {
   return $this->inicio;
 }
 public function setInicio($inicio)
 {
   $this->inicio = $inicio;
 }

 public function getFim()
 {
   return $this->fim;
 }
 public function setFim($fim)
 {
   $this->fim = $fim;
 }

public function getTurno()
{
return $this->turno;
}
public function setTurno($turno)
{
  $this->turno = $turno;
}
public function getNumPeriodo()
{
return $this->numPeriodo;
}
public function setNumPeriodo($numPeriodo)
{
  $this->numPeriodo = $numPeriodo;
}

}

 ?>
