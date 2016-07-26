<?php
  include_once '../static/top.php';

  require_once '../../Tools/Methods.php';

  require_once('../../dao/ProfessorDAO.php');
  require_once('../../model/Professor.php');

  $daoProf = ProfessorDAO::getInstance();
  $profs = $daoProf->getAll();

?>
<div class="x_title">
    <h3>Professores: </h3>
    <div class="clearfix"></div>
</div>
<div class="x_panel">
    <table class="table table-hover" border="0" align="center" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($profs as $prof) :
            ?>
            <tr>
                <th scope="row"><?= $prof->getIdProfessor() ?> </th>
                <th scope="row"><?= $prof->getNome() ?> </th>
                <th scope="row"><?= getStringGeneroProf($prof->getGenero()) ?> </th>
                <td>
                      <button class="btn btn-info" onclick="alterar(<?= $prof->getIdProfessor() ?>)">Editar </button>
                      <button class="btn btn-info" onclick="excluir(<?= $prof->getIdProfessor() ?>);">Remover</button>
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
