<?php

  require_once __DIR__.'/../bd/conexao.php';
  require_once __DIR__.'/../model/Periodo.php';

  class PeriodoDAO
  {

    public static $instance;


    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new PeriodoDAO();
        return self::$instance;
    }

    public function getAll()
    {
        $sql = "SELECT idPeriodo, Inicio as inicio, Fim as fim, Turno as turno, Numperiodo as numPeriodo FROM estudosorientados.periodo;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();

        return $p_sql->fetchAll(PDO::FETCH_CLASS, "Periodo");
    }

    public function get($id)
    {
        $sql = "SELECT idPeriodo, Inicio as inicio, Fim as fim, Turno as turno, Numperiodo as numPeriodo FROM estudosorientados.periodo "
            . "WHERE idPeriodo = :id;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        $p_sql->setFetchMode(PDO::FETCH_CLASS, "Periodo");
        return $p_sql->fetch();
    }

    public function insert(Periodo $periodo)
    {
      $sql = "INSERT INTO estudosorientados.periodo (Inicio, Fim, Turno, Numperiodo) "
      . " VALUES (:inicio, :fim, :turno, :numperiodo);";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":inicio", $periodo->getInicio());
      $p_sql->bindValue(":fim", $periodo->getFim());
      $p_sql->bindValue(":turno", $periodo->getTurno());
      $p_sql->bindValue(":numperiodo", $periodo->getNumPeriodo());
      $bool = $p_sql->execute();

      return $bool;
    }

    public function update(Periodo $periodo)
    {
      $sql = "UPDATE estudosorientados.periodo SET "
            . "Inicio=:inicio, "
            . "Fim=:fim, "
            . "Turno=:turno, "
            . "Numperiodo=:numperiodo "
            . "WHERE idPeriodo = :idPeriodo";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":inicio", $periodo->getInicio());
      $p_sql->bindValue(":fim", $periodo->getFim());
      $p_sql->bindValue(":turno", $periodo->getTurno());
      $p_sql->bindValue(":numperiodo", $periodo->getNumPeriodo());
      $p_sql->bindValue(":idPeriodo", $periodo->getIdPeriodo());

      $bool = $p_sql->execute();

      return $bool;
    }

    public function delete($id)
    {
      $sql = "DELETE FROM estudosorientados.periodo WHERE idPeriodo=:idPeriodo";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":idPeriodo", $id);
      $bool = $p_sql->execute();

      return $bool;
    }

  }



 ?>
