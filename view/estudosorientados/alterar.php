<?php
include_once '../static/top.php';


include_once '../../Tools/Methods.php';

require_once '../../model/EstudoOrientado.php';
require_once '../../dao/EstudoOrientadoDAO.php';


$dao = EstudoOrientadoDAO::getInstance();

if (isset($_POST['confirm'])) {
  $id = $_POST['id'];
  $professor = $_POST['professor'];
  $turma = $_POST['turma'];
  $periodo = $_POST['periodo'];
  $diaDaSemana = $_POST['diaDaSemana'];

  $obj = new EstudoOrientado();
  $obj->setIdEO($id);
  $obj->setProfessor($professor);
  $obj->setTurma($turma);
  $obj->setPeriodo($periodo);
  $obj->setDiaDaSemana($diaDaSemana);

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

<h3>Alterar Turma:</h3>
<div class="ln_solid"></div>

<form action="" method="POST" class="form-horizontal form-label-left">
  <input hidden name="id" value="<?= $obj->getIdEO() ?>">

  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="professor"> Professor
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control col-md-7 col-xs-12" id="professor" name="professor">
            <?php returnListProfSelect($obj->getProfessor()); ?>
        </select>
      </div>
  </div>
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="turma"> Turma
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control col-md-7 col-xs-12" id="turma" name="turma">
          <?php returnListTurmaSelect($obj->getTurma()); ?>
        </select>
      </div>
  </div>
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="periodo"> Período
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control col-md-7 col-xs-12" id="periodo" name="periodo">
            <?php returnListPeriodoSelect($obj->getPeriodo()) ?>
        </select>
      </div>
  </div>
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diaDaSemana"> Dia da Semana
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control col-md-7 col-xs-12" id="diaDaSemana" name="diaDaSemana">
            <option <?= ($obj->getDiaDaSemana() == "Segunda") ? "selected" : "" ?> value="Segunda" >Segunda-feira</option>
            <option <?= ($obj->getDiaDaSemana() == "Terça") ? "selected" : "" ?> value="Terça" >Terça-feira</option>
            <option <?= ($obj->getDiaDaSemana() == "Quarta") ? "selected" : "" ?> value="Quarta" >Quarta-feira</option>
            <option <?= ($obj->getDiaDaSemana() == "Quinta") ? "selected" : "" ?> value="Quinta" >Quinta-feira</option>
            <option <?= ($obj->getDiaDaSemana() == "Sexta") ? "selected" : "" ?> value="Sexta" >Sexta-feira</option>
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
