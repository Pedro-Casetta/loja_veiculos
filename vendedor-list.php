<?php

require "connection.php";
require "classes/Vendedor.php";

$sql = "SELECT * FROM vendedor ORDER BY codigo";
$stmt = $conn->query($sql);
$vendedores = $stmt->fetchAll(PDO::FETCH_CLASS, "Vendedor");


require_once "header_inc.php";

?>

<div class="container px-4 py-5" id="icon-grid">
    <h2 class="pb-2 border-bottom">Gerenciamento de Vendedores</h2>
    <p>Permite a inclusão, edição e exclusão dos vendedores da JK Veículos.</p>
    <br/>
    <div class="container">
    <a class="btn btn-success" href="vendedor-insert.php">Cadastrar Novo Vendedor</a>
    <p></p>
    <table class="table table-bordered">
        <tr class="table-success text-center text-center">
        <th>#</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Celular</th>
        <th>Foto</th>

        <th>Opções</th>
        </tr>
        <?php foreach($vendedores as $vendedor) { ?>
        <tr class="text-center">
            <td class="table-light" style="width:4%"><?= $vendedor->__get('codigo'); ?></td>
            <td class="table-light" style="width:10%"><?= $vendedor->__get('nome'); ?></td>
            <td class="table-light" style="width:10%"><?= $vendedor->__get('email'); ?></td>
            <td class="table-light" style="width:10%"><?= $vendedor->__get('telefone'); ?></td>
            <td class="table-light" style="width:5%"><?= $vendedor->__get('celular'); ?></td>
            <td class="table-light" style="width:10%"><?= $vendedor->__get('foto'); ?></td>
            <td class="table-light" style="width:10%">
            <a href="vendedor-edit.php?codigo=<?= $vendedor->__get('codigo'); ?>"><button type="button" class="btn btn-primary">Editar</button></a>
            <a href="vendedor-destroy.php?codigo=<?= $vendedor->__get('codigo'); ?>"><button type="button" class="btn btn-danger">Excluir</button>
        </td>
        </tr>
        <?php } ?>
    </table>
    </div>
</div>

<?php require_once "footer_inc.php"; ?>