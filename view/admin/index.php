<?php
  include_once '../static/top.php';

  require_once '../../Tools/Methods.php';

  require_once('../../dao/AdminDAO.php');
  require_once('../../model/Admin.php');

  $dao = AdminDAO::getInstance();
  $objs = $dao->getAll();

?>
<div class="x_title">
    <h3>Administradores: </h3>
    <div class="clearfix"></div>
</div>
<div class="x_panel">
    <table class="table table-hover" border="0" align="center" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Login</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($objs as $obj) :
            ?>
            <tr>
                <th scope="row"><?= $obj->getIdUsuario() ?> </th>
                <th scope="row"><?= $obj->getLogin() ?> </th>
                <td>
                      <button class="btn btn-info" onclick="excluir(<?= $obj->getIdUsuario() ?>);">Remover</button>
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
