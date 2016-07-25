<?php
  include_once '../static/top.php';

  require_once '../../Tools/Methods.php';

  require_once('../../dao/ProfessorDAO.php');
  require_once('../../model/Professor.php');

  $daoCurso = CursoDAO::getInstance();
  $cursos = $daoCurso->getAll();

?>
<div class="x_title">
    <h3>Cursos: </h3>
    <div class="clearfix"></div>
</div>
<div class="x_panel">
    <table class="table table-hover" border="0" align="center" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Abreviação</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($cursos as $curso) :
            ?>
            <tr>
                <th scope="row"><?= $curso->getIdCurso() ?> </th>
                <th scope="row"><?= $curso->getNome() ?> </th>
                <th scope="row"><?= $curso->getAbreviatura() ?> </th>
                <td>
                      <button class="btn btn-info" onclick="alterar(<?= $curso->getIdCurso() ?>)">Editar </button>
                      <button class="btn btn-info" onclick="excluir(<?= $curso->getIdCurso() ?>);">Remover</button>
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
