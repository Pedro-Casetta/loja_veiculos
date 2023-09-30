<?php 

require "connection.php";
require "classes/Veiculo.php";

$sql = "SELECT * FROM veiculo ORDER BY marca, modelo";
$resultado = $conn->query($sql);
$veiculos = $resultado->fetchAll(PDO::FETCH_CLASS, "Veiculo");


require_once "header_inc.php";
?>

<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Veículos</h1>
  <hr class="my-3">
  <p class="lead">Conheça os veículos disponíveis em nossa loja.</p>
</div>

<br />
<div class="container">
  <?php foreach($veiculos as $veiculo) { ?>
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading"><?= $veiculo->__get('marca'); ?> <?= $veiculo->__get('modelo'); ?> <?= $veiculo->__get('ano_modelo');?></h2>
        <p class="lead">R$ <?= $veiculo->__get('preco'); ?></p>
        <p class="lead"><a href="veiculo-show.php?codigo=<?= $veiculo->__get('codigo');?>"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Detalhes</button></a></p>
      </div>
      <div class="col-md-5">
        <figure class="figure">
            <img src="images/<?= $veiculo->__get('foto'); ?>" class="figure-img img-fluid rounded" alt="Veículo <?= $veiculo->__get('marca'); ?> <?= $veiculo->__get('modelo'); ?> <?= $veiculo->__get('ano_modelo'); ?>">
        </figure>
      </div>
    </div>
    <hr class="featurette-divider">
  </div>
  <?php } ?>
</div>

<?php require_once "footer_inc.php"; ?>