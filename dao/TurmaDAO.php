<?php

  require_once __DIR__ .'/../bd/conexao.php';
  require_once __DIR__ .'/../model/Turma.php';

  class TurmaDAO
  {

    public static $instance;


    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new TurmaDAO();
        return self::$instance;
    }

    public function getAll()
    {
        $sql = "SELECT idTurma, Ano as ano, NumTurma as numTurma, Curso_idCurso as curso FROM estudosorientados.turma;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();

        return $p_sql->fetchAll(PDO::FETCH_CLASS, "Turma");
    }

    public function get($id)
    {
        $sql = "SELECT idTurma, Ano as ano, NumTurma as numTurma, Curso_idCurso as curso FROM estudosorientados.turma "
            . "WHERE idTurma = :id;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        $p_sql->setFetchMode(PDO::FETCH_CLASS, "Turma");
        return $p_sql->fetch();
    }

    public function insert(Turma $turma)
    {
      $sql = "INSERT INTO estudosorientados.turma (Ano, NumTurma, Curso_idCurso) "
      . " VALUES (:ano, :numTurma, :curso);";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":ano", $turma->getAno());
      $p_sql->bindValue(":numTurma", $turma->getNumTurma());
      $p_sql->bindValue(":curso", $turma->getCurso());
      $bool = $p_sql->execute();

      return $bool;
    }

    public function update(Turma $turma)
    {
      $sql = "UPDATE estudosorientados.turma SET "
            . "Ano=:ano, "
            . "NumTurma=:numTurma, "
            . "Curso_idCurso=:curso "
            . "WHERE idTurma = :idTurma";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":ano", $turma->getAno());
      $p_sql->bindValue(":numTurma", $turma->getNumTurma());
      $p_sql->bindValue(":curso", $turma->getCurso());
      $p_sql->bindValue(":idTurma", $turma->getIdTurma());

      $bool = $p_sql->execute();

      return $bool;
    }

    public function delete($id)
    {
      $sql = "DELETE FROM estudosorientados.turma WHERE idTurma=:idTurma";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":idTurma", $id);
      $bool = $p_sql->execute();

      return $bool;
    }

  }



 ?>
