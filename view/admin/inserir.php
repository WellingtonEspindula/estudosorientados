<?php
include_once '../static/top.php';
require_once '../../model/Admin.php';
require_once '../../dao/AdminDAO.php';

if (isset($_POST['confirm'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $obj = new Admin();
    $obj->setLogin($login);
    $obj->setSenha(md5($senha));

    $dao = AdminDAO::getInstance();
    $bool = $dao->insert($obj);

    if ($bool) {
      echo '<script language="javascript">';
      echo '  location.href = "index.php";';
      echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'var aux = confirm("Ocorreu um erro durante a inserção de registro!");';
        echo 'if (aux) {';
        echo '  location.href = "index.php";';
        echo '}';
        echo '</script>';
    }
} else {
?>

<h3>Inserir Curso:</h3>
<div class="ln_solid"></div>

<form action="" method="POST" class="form-horizontal form-label-left">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome"> Login
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" id="login" type="text"
                   name="login">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="senha"> Senha
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input class="form-control col-md-7 col-xs-12" id="senha" type="password"
                 name="senha">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button class="btn btn-success pull-right" name="confirm" type="submit">Enviar</button>
        </div>
    </div>
</form>

  <?php
}
include_once '../static/bottom.php';

 ?>
