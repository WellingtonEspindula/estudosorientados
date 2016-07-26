<?php

  require_once __DIR__ .'/../bd/conexao.php';
  require_once __DIR__ .'/../model/Admin.php';

  class AdminDAO
  {

    public static $instance;


    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new AdminDAO();
        return self::$instance;
    }

    public function getAll()
    {
        $sql = "SELECT idUsuario, login, senha FROM estudosorientados.usuario;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();

        return $p_sql->fetchAll(PDO::FETCH_CLASS, "Admin");
    }

    public function get($id)
    {
        $sql = "SELECT idUsuario, login, senha FROM estudosorientados.usuario; "
            . "WHERE idUsuario = :id;";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        $p_sql->setFetchMode(PDO::FETCH_CLASS, "Admin");
        return $p_sql->fetch();
    }

    public function insert(Admin $admin)
    {
      $sql = "INSERT INTO estudosorientados.usuario (login, senha) "
      . " VALUES (:login, :senha);";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":login", $admin->getLogin());
      $p_sql->bindValue(":senha", $admin->getSenha());
      $bool = $p_sql->execute();

      return $bool;
    }

    public function update(Admin $admin)
    {
      $sql = "UPDATE estudosorientados.usuario SET "
            . "login=:login, "
            . "senha=:senha "
            . "WHERE idUsuario = :idUsuario";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":login", $admin->getLogin());
      $p_sql->bindValue(":senha", $admin->getSenha());
      $p_sql->bindValue(":idUsuario", $admin->getIdUsuario());

      $bool = $p_sql->execute();

      return $bool;
    }

    public function delete($id)
    {
      $sql = "DELETE FROM estudosorientados.usuario WHERE idUsuario=:idUsuario";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":idUsuario", $id);
      $bool = $p_sql->execute();

      return $bool;
    }

    public function autentica(Admin $admin)
    {
      $sql = "SELECT * FROM estudosorientados.usuario WHERE login = :login AND senha = :senha";
      $p_sql = Conexao::getInstance()->prepare($sql);
      $p_sql->bindValue(":login", mysql_escape_string($admin->getLogin()));
      $p_sql->bindValue(":senha", mysql_escape_string($admin->getSenha()));
      $p_sql->execute();

      return $p_sql->rowCount() > 0;
    }

  }



 ?>
