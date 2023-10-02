<?php 

require "connection.php";
require "classes/Vendedor.php";

$sql = "SELECT * FROM vendedor ORDER BY nome";
$resultado = $conn->query($sql);
$vendedores = $resultado->fetchAll(PDO::FETCH_CLASS, "Vendedor");

require_once "header_inc.php"; 



?>



<main>
  <div class="container py-4">
    <div class="container my-5">
      <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
          <h1 class="display-4 fw-bold lh-1 text-body-emphasis">JK Veículos Multimarcas</h1>
          <p class="lead">Na JK Veículos, estamos empenhados em ajudá-lo a encontrar o veículo dos seus sonhos, seja ele novo ou seminovo.</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          </div>
        </div>
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
            <img class="rounded-lg-3" src="images/fachada.png" alt="" width="720">
        </div>
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 bg-body-tertiary rounded-3">
          <h2>Carros 0km</h2>
          <p>Veja a lista completa de carros novos disponísveis.</p>
          <a href="veiculos-novo.php">
          <button class="btn btn-outline-secondary" type="button">Ver</button>
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-body-tertiary rounded-3">
          <h2>Carros Seminovos</h2>
          <p>Ou veja a lista completa de carros seminovos disponísveis.</p>
          <a href="veiculos-seminovo.php">
          <button class="btn btn-outline-secondary" type="button">Ver</button>
          </a>
        </div>
      </div>
    </div>

    <div class="container px-4 py-5" id="icon-grid">
      <h2 class="pb-2 border-bottom">Conheça nossos Vendedores</h2>
      <br/>
      <div class="container">
        <?php foreach($vendedores as $vendedor) { ?>
          <div class="row featurette">
            <div class="col-md-2">
              <figure class="figure">
                  <img src="<?= $vendedor->__get('foto'); ?>" class="figure-img img-fluid rounded" alt="Veículo <?= $vendedor->__get('marca'); ?> <?= $vendedor->__get('modelo'); ?> <?= $vendedor->__get('ano_modelo'); ?>" width="130">
              </figure>
            </div>
            <div class="col-md-4">
              <h3><?= $vendedor->__get('nome'); ?></h3>
              <p class="lead"><?= $vendedor->__get('email'); ?></p>
              <p class="lead"><?= $vendedor->__get('telefone'); ?></p>
              <p class="lead"><?= $vendedor->__get('celular'); ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</main>


<?php require_once "footer_inc.php"; ?>