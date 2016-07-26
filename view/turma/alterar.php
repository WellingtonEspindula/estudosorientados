<?php
include_once '../static/top.php';
require_once '../../model/Turma.php';
require_once '../../dao/TurmaDAO.php';
require_once '../../model/Curso.php';
require_once '../../dao/CursoDAO.php';

$dao = TurmaDAO::getInstance();

if (isset($_POST['confirm'])) {

  $id = $_POST['id'];
  $ano = $_POST['ano'];
  $numTurma = $_POST['numTurma'];
  $curso = $_POST['curso'];

  $obj = new Turma();
  $obj->setIdTurma($id);
  $obj->setAno($ano);
  $obj->setNumTurma($numTurma);
  $obj->setCurso($curso);

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
  <input hidden name="id" value="<?= $obj->getIdTurma() ?>">
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano"> Ano
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <input class="form-control col-md-7 col-xs-12" id="ano" type="number"
                 name="ano" value="<?= $obj->getAno() ?>">
      </div>
  </div>
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numTurma"> Número
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <input class="form-control col-md-7 col-xs-12" id="numTurma" type="number"
                 name="numTurma" value="<?= $obj->getNumTurma() ?>">
      </div>
  </div>
  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="curso"> Curso
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control col-md-7 col-xs-12" id="curso" name="curso">
            <?php
              $daoCurso = CursoDAO::getInstance();
              $cursos = $daoCurso->getAll();

              foreach ($cursos as $curso) :
             ?>
                <option <?= ($obj->getCurso() == $curso->getIdCurso()) ? "selected" : "" ?>
                  value="<?= $curso->getIdCurso() ?>">
                  <?= $curso->getAbreviatura() ?>
                </option>;
                <?php endforeach; ?>
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
