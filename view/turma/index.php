<?php
  include_once '../static/top.php';

  require_once '../../Tools/Methods.php';

  require_once('../../dao/TurmaDAO.php');
  require_once('../../model/Turma.php');

  $dao = TurmaDAO::getInstance();
  $objs = $dao->getAll();

?>
<div class="x_title">
    <h3>Turmas: </h3>
    <div class="clearfix"></div>
</div>
<div class="x_panel">
    <table class="table table-hover" border="0" align="center" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Ano</th>
            <th>Número</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($objs as $obj) :
            ?>
            <tr>
                <th scope="row"><?= $obj->getIdTurma() ?> </th>
                <th scope="row"><?= $obj->getAno()."º" ?> </th>
                <th scope="row"><?= $obj->getNumTurma() ?> </th>
                <th scope="row"><?= getStringCurso($obj->getCurso()) ?> </th>
                <td>
                      <button class="btn btn-info" onclick="alterar(<?= $obj->getIdTurma() ?>)">Editar </button>
                      <button class="btn btn-info" onclick="excluir(<?= $obj->getIdTurma() ?>);">Remover</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <button type="button" class="btn btn-success pull-right" onclick="location.href = 'inserir.php'">Inserir
    </button>
</div>

<?php
  include_once '../static/bottom.php';
?>
