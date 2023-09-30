<?php 

if (isset($_GET['codigo'])) {
    require "connection.php";
    require "classes/Veiculo.php";

    $id = $_GET['codigo'];

    $sql = "SELECT * FROM veiculo WHERE codigo = :codigo";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':codigo' => $id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Veiculo');
    $veiculo = $stmt->fetch();


}else{
    header("location: veiculos.php");
    exit;
}
require_once "header_inc.php"; 
?>

<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Veículos</h1>
  <hr class="my-3">
  <p class="lead">Detalhes do veículo.</p>
</div>

<div class="container">
  <a class="btn btn-primary" href="veiculos.php">Voltar</a>
  <p></p>
  <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Marca: </strong>
                <p><?= $veiculo->__get('marca'); ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Modelo: </strong>
                <p><?= $veiculo->__get('modelo'); ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cor: </strong>
                <p><?= $veiculo->__get('cor'); ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ano de fabricação: </strong>
                <p><?= $veiculo->__get('ano_fabricacao'); ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ano do modelo: </strong>
                <p><?= $veiculo->__get('ano_modelo'); ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Combustível: </strong>
                <p><?= $veiculo->__get('combustivel'); ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Preço: </strong>
                <p><?= $veiculo->__get('preco'); ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalhes: </strong>
                <p><?= $veiculo->__get('detalhes'); ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto: </strong>
                <br />
                <figure class="figure">
                    <img src="images/<?= $veiculo->__get('foto'); ?>" class="figure-img img-fluid rounded" alt="Veículo <?= $veiculo->__get('marca'); ?> <?= $veiculo->__get('modelo'); ?> <?= $veiculo->__get('ano_modelo'); ?>">
                </figure>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer_inc.php"; ?>