<?php

  require_once __DIR__.'/../bd/conexao.php';
  require_once __DIR__.'/../model/Curso.php';

  class CursoDAO
  {

    public static $instance;


    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new CursoDAO();
        return self::$instance;
    }

    public function getAll()
    {
        $sql = "SELECT idCurso, Nome as  nome, Abreviatura as abreviatura FROM estudosorientados.curso;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();

        return $p_sql->fetchAll(PDO::FETCH_CLASS, "Curso");
    }

    public function get($id)
    {
        $sql = "SELECT idCurso, Nome as  nome, Abreviatura as abreviatura FROM estudosorientados.curso "
            . "WHERE idCurso = :id;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        $p_sql->setFetchMode(PDO::FETCH_CLASS, "Curso");
        return $p_sql->fetch();
    }

    public function insert(Curso $curso)
    {
      $sql = "INSERT INTO estudosorientados.curso (Nome, Abreviatura) "
      . " VALUES (:nome, :abreviatura);";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":nome", $curso->getNome());
      $p_sql->bindValue(":abreviatura", $curso->getAbreviatura());
      $bool = $p_sql->execute();

      return $bool;
    }

    public function update(Curso $curso)
    {
      $sql = "UPDATE estudosorientados.curso SET "
            . "Nome=:nome, "
            . "Abreviatura=:abreviatura "
            . "WHERE idCurso=:idCurso";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":nome", $curso->getNome());
      $p_sql->bindValue(":abreviatura", $curso->getAbreviatura());
      $p_sql->bindValue(":idCurso", $curso->getIdCurso());

      $bool = $p_sql->execute();

      return $bool;
    }

    public function delete($id)
    {
      $sql = "DELETE FROM estudosorientados.curso WHERE idCurso=:idCurso";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":idCurso", $id);
      $bool = $p_sql->execute();

      return $bool;
    }

  }



 ?>
