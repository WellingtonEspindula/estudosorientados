<?php
  include_once '../static/top.php';

  require_once '../../Tools/Methods.php';

  require_once('../../dao/PeriodoDAO.php');
  require_once('../../model/Periodo.php');

  $dao = PeriodoDAO::getInstance();
  $objs = $dao->getAll();

?>
<div class="x_title">
    <h3>Períodos: </h3>
    <div class="clearfix"></div>
</div>
<div class="x_panel">
    <table class="table table-hover" border="0" align="center" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Turno</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($objs as $obj) :
            ?>
            <tr>
                <th scope="row"><?= $obj->getNumPeriodo()."º" ?> </th>
                <th scope="row"><?= $obj->getInicio() ?> </th>
                <th scope="row"><?= $obj->getFim() ?> </th>
                <th scope="row"><?= $obj->getTurno() ?> </th>
                <td>
                      <button class="btn btn-info" onclick="alterar(<?= $obj->getIdPeriodo() ?>)">Editar </button>
                      <button class="btn btn-info" onclick="excluir(<?= $obj->getIdPeriodo() ?>);">Remover</button>
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
