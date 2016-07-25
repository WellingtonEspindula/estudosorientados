<?php
include_once '../static/top.php';
require_once '../../model/Curso.php';
require_once '../../dao/CursoDAO.php';

$dao = CursoDAO::getInstance();

if (isset($_POST['confirm'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $abreviatura = $_POST['abreviatura'];

    $obj = new Curso();
    $obj->setIdCurso($id);
    $obj->setNome($nome);
    $obj->setAbreviatura($abreviatura);

    $bool = $dao->update($obj);

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

  $id = $_GET["id"];
  $obj = $dao->get($id);

?>

<h3>Alterar Curso:</h3>
<div class="ln_solid"></div>

<form action="" method="POST" class="form-horizontal form-label-left">
    <input hidden name="id" value="<?= $id ?>">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome"> Nome
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" id="nome" type="text"
                   name="nome" value="<?= $obj->getNome() ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abreviacao"> Abreviação
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" id="abreviatura" type="text"
                   name="abreviatura" value="<?= $obj->getAbreviatura() ?>">
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
