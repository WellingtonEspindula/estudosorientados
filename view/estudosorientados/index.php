<?php
  include_once '../static/top.php';

  require_once '../../Tools/Methods.php';

  require_once('../../dao/EstudoOrientadoDAO.php');
  require_once('../../model/EstudoOrientado.php');

  $daoEO = EstudoOrientadoDAO::getInstance();
  $eos = $daoEO->getAll();

?>
<div class="x_title">
    <h3>Estudos Orientados:</h3>
    <div class="clearfix"></div>
</div>
<div class="x_panel">
    <table class="table table-hover" border="0" align="center" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Professor</th>
            <th>Turma</th>
            <th>Período</th>
            <th>Dia da Semana</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($eos as $eo) :
            ?>
            <tr>
                <th scope="row"><?= $eo->getIdEO() ?> </th>
                <td> <?= getStringProfessor($eo->getProfessor()) ?> </td>
                <td> <?= getStringTurma($eo->getTurma()) ?> </td>
                <td> <?= getStringPeriodo($eo->getPeriodo()) ?> </td>
                <td> <?= $eo->getDiaDaSemana() ?> </td>
                <td>
                      <button class="btn btn-info" onclick="alterar(<?=$eo->getIdEO()?>)">Editar </button>
				              <button class="btn btn-info" onclick="excluir(<?=$eo->getIdEO()?>);">Remover</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <button type="button" class="btn btn-success pull-right" onclick="location.href = 'inserir.php'">Inserir
    </button>
    <button type="button" class="btn btn-danger pull-right" onclick="excluirTudo()">Excluir todos
    </button>
</div>

<?php
  include_once '../static/bottom.php';
?>
