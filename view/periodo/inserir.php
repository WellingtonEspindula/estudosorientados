<?php
include_once '../static/top.php';
require_once '../../model/Periodo.php';
require_once '../../dao/PeriodoDAO.php';

if (isset($_POST['confirm'])) {
    $inicio = $_POST['inicio'];
    $fim = $_POST['fim'];
    $turno = $_POST['turno'];
    $numPeriodo = $_POST['numPeriodo'];

    $obj = new Periodo();
    $obj->setInicio($inicio);
    $obj->setFim($fim);
    $obj->setTurno($turno);
    $obj->setNumPeriodo($numPeriodo);

    $dao = PeriodoDAO::getInstance();
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
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inicio"> Inicio
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" id="inicio" type="text"
                   name="inicio">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fim"> Fim
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" id="fim" type="text"
                   name="fim">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="turno"> Turno
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control col-md-7 col-xs-12" id="turno" name="turno">
                                  <option value="Manhã">Manhã</option>;
                                  <option value="Tarde">Tarde</option>
                                  <option value="Noite">Noite</option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numPeriodo"> Período
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" id="numPeriodo" type="text"
                   name="numPeriodo">
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
