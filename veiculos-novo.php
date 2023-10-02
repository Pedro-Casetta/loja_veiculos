<?php 

require "connection.php";
require "classes/Veiculo.php";

$sql = "SELECT * FROM veiculo where tipo = 'Novo' ORDER BY marca, modelo";
$resultado = $conn->query($sql);
$veiculos = $resultado->fetchAll(PDO::FETCH_CLASS, "Veiculo");


require_once "header_inc.php";
?>

<div class="container px-4 py-5" id="icon-grid">
  <h2 class="pb-2 border-bottom">Estoque de Veículos 0km</h2>
  <br/>
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
                <img src="images/<?= $veiculo->__get('foto'); ?>" class="figure-img img-fluid rounded" alt="Veículo <?= $veiculo->__get('marca'); ?> <?= $veiculo->__get('modelo'); ?> <?= $veiculo->__get('ano_modelo'); ?>" width="300">
            </figure>
          </div>
        </div>
        <hr class="featurette-divider">
        <?php } ?>

      </div>
  </div>
</div>



<?php require_once "footer_inc.php"; ?>