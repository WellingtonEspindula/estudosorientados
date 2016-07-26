<?php

  require_once __DIR__ .'/../bd/conexao.php';
  require_once __DIR__ .'/../model/Professor.php';

  class ProfessorDAO
  {

    public static $instance;


    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new ProfessorDAO();
        return self::$instance;
    }

    public function getAll()
    {
        $sql = "SELECT idProfessor, Nome as nome, Genero as genero FROM estudosorientados.professor;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();

        return $p_sql->fetchAll(PDO::FETCH_CLASS, "Professor");
    }

    public function get($id)
    {
        $sql = "SELECT idProfessor, Nome as nome, Genero as genero FROM estudosorientados.professor "
            . "WHERE idProfessor = :id;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        $p_sql->setFetchMode(PDO::FETCH_CLASS, "Professor");
        return $p_sql->fetch();
    }

    public function insert(Professor $prof)
    {
      $sql = "INSERT INTO estudosorientados.professor (Nome, Genero) "
      . " VALUES (:nome, :genero);";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":nome", $prof->getNome());
      $p_sql->bindValue(":genero", $prof->getGenero());
      $bool = $p_sql->execute();

      return $bool;
    }

    public function update(Professor $prof)
    {
      $sql = "UPDATE estudosorientados.professor SET "
            . "Nome=:nome, "
            . "Genero=:genero "
            . "WHERE idProfessor = :idProfessor";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":nome", $prof->getNome());
      $p_sql->bindValue(":genero", $prof->getGenero());
      $p_sql->bindValue(":idProfessor", $prof->getIdProfessor());

      $bool = $p_sql->execute();

      return $bool;
    }

    public function delete($id)
    {
      $sql = "DELETE FROM estudosorientados.professor WHERE idProfessor=:idProfessor";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":idProfessor", $id);
      $bool = $p_sql->execute();

      return $bool;
    }

    

  }



 ?>
