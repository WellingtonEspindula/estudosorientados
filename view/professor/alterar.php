<?php
include_once '../static/top.php';
require_once '../../model/Professor.php';
require_once '../../dao/ProfessorDAO.php';

$dao = ProfessorDAO::getInstance();

if (isset($_POST['confirm'])) {

  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $genero = $_POST['genero'];

  $obj = new Professor();
  $obj->setIdProfessor($id);
  $obj->setNome($nome);
  $obj->setGenero($genero);

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
  <input hidden name="id" value="<?= $obj->getIdProfessor() ?>">
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome"> Nome
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <input class="form-control col-md-7 col-xs-12" id="nome" type="text"
                 name="nome" value="<?= $obj->getNome() ?>">
      </div>
  </div>
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genero"> Gênero
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control col-md-7 col-xs-12" id="genero" name="genero">
                                <option <?= ($obj->getGenero() == "M") ? "selected" : "" ?> value="M">Masculino</option>;
                                <option <?= ($obj->getGenero() == "F") ? "selected" : "" ?> value="F">Feminino</option>
        </select>
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
