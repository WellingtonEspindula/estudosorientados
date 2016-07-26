<?php

  require_once __DIR__ .'/../bd/conexao.php';
  require_once __DIR__.'/../model/EstudoOrientado.php';

  class EstudoOrientadoDAO
  {

    public static $instance;


    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new EstudoOrientadoDAO();
        return self::$instance;
    }

    public function getAll()
    {
        $sql = "SELECT idEO, Professor_idProfessor as professor, Turma_idTurma as turma, Periodo_idPeriodo as periodo, DiasDaSemana as diaDaSemana FROM estudosorientados.eo;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();

        return $p_sql->fetchAll(PDO::FETCH_CLASS, "EstudoOrientado");
    }

    public function get($id)
    {
        $sql = "SELECT idEO, Professor_idProfessor as professor, Turma_idTurma as turma, Periodo_idPeriodo as periodo, DiasDaSemana as diaDaSemana FROM estudosorientados.eo "
            . "WHERE idEO = :id;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        $p_sql->setFetchMode(PDO::FETCH_CLASS, "EstudoOrientado");
        return $p_sql->fetch();
    }

    public function insert(EstudoOrientado $eo)
    {
      $sql = "INSERT INTO estudosorientados.eo (Professor_idProfessor, Turma_idTurma, Periodo_idPeriodo, DiasDaSemana) "
      . " VALUES (:professor, :turma, :periodo, :diadasemana);";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":professor", $eo->getProfessor());
      $p_sql->bindValue(":turma", $eo->getTurma());
      $p_sql->bindValue(":periodo", $eo->getPeriodo());
      $p_sql->bindValue(":diadasemana", $eo->getDiaDaSemana());
      $bool = $p_sql->execute();

      return $bool;
    }

    public function update(EstudoOrientado $eo)
    {
      $sql = "UPDATE estudosorientados.eo SET "
            . "Professor_idProfessor=:professor, "
            . "Turma_idTurma=:turma, "
            . "Periodo_idPeriodo=:periodo, "
            . "DiasDaSemana=:diadasemana "
            . "WHERE idEo = :idEO";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":professor", $eo->getProfessor());
      $p_sql->bindValue(":turma", $eo->getTurma());
      $p_sql->bindValue(":periodo", $eo->getPeriodo());
      $p_sql->bindValue(":diadasemana", $eo->getDiaDaSemana());
      $p_sql->bindValue(":idEO", $eo->getIdEO());

      $bool = $p_sql->execute();

      return $bool;
    }

    public function delete($id)
    {
      $sql = "DELETE FROM estudosorientados.eo WHERE idEo=:idEo";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":idEo", $id);
      $bool = $p_sql->execute();

      return $bool;
    }

    public function deleteAll()
    {
      $sql = "DELETE FROM estudosorientados.eo";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $bool = $p_sql->execute();

      return $bool;
    }

  }



 ?>
