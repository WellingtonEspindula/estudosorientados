<?php
include_once '../static/top.php';

include_once '../../Tools/Methods.php';

require_once '../../model/EstudoOrientado.php';
require_once '../../dao/EstudoOrientadoDAO.php';

if (isset($_POST['confirm'])) {
    $professor = $_POST['professor'];
    $turma = $_POST['turma'];
    $periodo = $_POST['periodo'];
    $diaDaSemana = $_POST['diaDaSemana'];

    $obj = new EstudoOrientado();
    $obj->setProfessor($professor);
    $obj->setTurma($turma);
    $obj->setPeriodo($periodo);
    $obj->setDiaDaSemana($diaDaSemana);

    $dao = EstudoOrientadoDAO::getInstance();
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

<h3>Inserir Estudo Orientado:</h3>
<div class="ln_solid"></div>

<form action="" method="POST" class="form-horizontal form-label-left">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="professor"> Professor
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control col-md-7 col-xs-12" id="professor" name="professor">
              <?php returnListProf(); ?>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="turma"> Turma
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control col-md-7 col-xs-12" id="turma" name="turma">
            <?php returnListTurma(); ?>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="periodo"> Período
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control col-md-7 col-xs-12" id="periodo" name="periodo">
              <?php returnListPeriodo() ?>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diaDaSemana"> Dia da Semana
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control col-md-7 col-xs-12" id="diaDaSemana" name="diaDaSemana">
              <option value="Segunda" >Segunda-feira</option>
              <option value="Terça" >Terça-feira</option>
              <option value="Quarta" >Quarta-feira</option>
              <option value="Quinta" >Quinta-feira</option>
              <option value="Sexta" >Sexta-feira</option>
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
