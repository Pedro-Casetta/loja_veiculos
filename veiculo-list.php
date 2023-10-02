<?php

require "connection.php";
require "classes/Veiculo.php";

$sql = "SELECT * FROM veiculo ORDER BY codigo";
$stmt = $conn->query($sql);
$veiculos = $stmt->fetchAll(PDO::FETCH_CLASS, "Veiculo");


require_once "header_inc.php";

?>


<div class="container px-4 py-5" id="icon-grid">
    <h2 class="pb-2 border-bottom">Gerenciamento de Veículos</h2>
    <p>Permite a inclusão, edição e exclusão dos veículos exibidos na página de veículos.</p>
    <br/>


<div class="container">
  <a class="btn btn-success" href="Veiculo-insert.php">Cadastrar Novo Veículo</a>
  <p></p>
  <table class="table table-bordered">
    <tr class="table-success text-center text-center">
      <th>#</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Cor</th>
      <th>Ano de fabricação</th>
      <th>Ano do modelo</th>
      <th>Combustível</th>
      <th>Preço (R$)</th>
      <th>Detalhes</th>
      <th>Foto</th>
      <th>Tipo</th>
      <th>Opções</th>
    </tr>
    <?php foreach($veiculos as $veiculo) { ?>
      <tr class="text-center">
        <td class="table-light" style="width:4%"><?= $veiculo->__get('codigo'); ?></td>
        <td class="table-light" style="width:10%"><?= $veiculo->__get('marca'); ?></td>
        <td class="table-light" style="width:10%"><?= $veiculo->__get('modelo'); ?></td>
        <td class="table-light" style="width:10%"><?= $veiculo->__get('cor'); ?></td>
        <td class="table-light" style="width:5%"><?= $veiculo->__get('ano_fabricacao'); ?></td>
        <td class="table-light" style="width:5%"><?= $veiculo->__get('ano_modelo'); ?></td>
        <td class="table-light" style="width:5%"><?= $veiculo->__get('combustivel'); ?></td>
        <td class="table-light" style="width:10%"><?= $veiculo->__get('preco'); ?></td>
        <td class="table-light" style="width:10%"><?= $veiculo->__get('detalhes'); ?></td>
        <td class="table-light" style="width:10%"><?= $veiculo->__get('foto'); ?></td>
        <td class="table-light" style="width:10%"><?= $veiculo->__get('tipo'); ?></td>
        <td class="table-light" style="width:10%">
          <a href="veiculo-edit.php?codigo=<?= $veiculo->__get('codigo'); ?>"><button type="button" class="btn btn-primary">Editar</button></a>
          <a href="veiculo-destroy.php?codigo=<?= $veiculo->__get('codigo'); ?>"><button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>
</div>

<?php require_once "footer_inc.php"; ?>