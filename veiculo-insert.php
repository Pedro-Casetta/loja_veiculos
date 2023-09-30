<?php

$marca = "";
$modelo = "";
$cor = "";
$ano_fabricacao = "";
$ano_modelo = "";
$combustivel = "";
$preco = "";
$detalhes = "";
$foto = "";
$flag_msg = null;
$msg = "";

if (isset($_POST["enviar"])) {
  try {
    require("connection.php");

    $marca = $_POST["marcaVeiculo"];
    $modelo = $_POST["modeloVeiculo"];
    $cor = $_POST['corVeiculo'];
    $ano_fabricacao = $_POST['anoFabricacaoVeiculo'];
    $ano_modelo = $_POST['AnoModeloVeiculo'];
    $combustivel = $_POST['combustivelVeiculo'];
    $preco = $_POST['precoVeiculo'];
    $detalhes = $_POST['detalhesVeiculo'];
    $foto = $_POST["fotoVeiculo"];
    
    if (empty($_POST["marcaVeiculo"]) || empty($_POST["modeloVeiculo"]) || empty($_POST["fotoVeiculo"])) {
      $flag_msg = false; //Erro 
      $msg = "Dados incompletos, preencha o formulário corretamente!";
    } else {
      $stmt = $conn->prepare("INSERT INTO veiculo (marca, modelo, cor, ano_fabricacao, ano_modelo, combustivel, preco, detalhes, foto) VALUES (:marca, :modelo, :cor, :ano_fabricacao, :ano_modelo, :combustivel, :preco, :detalhes, :foto)");
                              
      $stmt->bindParam(":marca", $marca, PDO::PARAM_STR);
      $stmt->bindParam(":modelo", $modelo, PDO::PARAM_STR);
      $stmt->bindParam(":cor", $cor, PDO::PARAM_STR);
      $stmt->bindParam(":ano_fabricacao", $ano_fabricacao);
      $stmt->bindParam(":ano_modelo", $ano_modelo);
      $stmt->bindParam(":combustivel", $combustivel, PDO::PARAM_STR);
      $stmt->bindParam(":preco", $preco);
      $stmt->bindParam(":detalhes", $detalhes, PDO::PARAM_STR);
      $stmt->bindParam(":foto", $foto, PDO::PARAM_STR);

      $stmt->execute();

      $flag_msg = true; // Sucesso 
      $msg = "Dados enviados com sucesso!";
      $marca = "";
      $modelo = "";
      $cor = "";
      $ano_fabricacao = "";
      $ano_modelo = "";
      $combustivel = "";
      $preco = "";
      $detalhes = "";
      $foto = "";
    }
  } catch(PDOException $e) {
    $flag_msg = false; //Erro
    $msg = "Erro na conexão com o Banco de dados: " . $e->getMessage();
  }
  
  $conn = null;
}

require_once "header_inc.php"; ?>


<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Inclusao de Veículo</h1>
  <hr class="my-3">
  <p class="lead">Permite a inclusão dos Veículos exibidos na página de Veículos.</p>
</div>


<div class="container">
  <?php 
    if (!is_null($flag_msg)) {
      if ($flag_msg) {
        echo "<div class='alert alert-success' role='alert'>$msg</div>"; 
      }else{
        echo "<div class='alert alert-warning' role='alert'>$msg</div>"; 
      }
    }
  ?>
  <form method="POST">
    <div class="form-group">
      <label for="marcaVeiculo">Marca do Veículo:</label>
      <input type="text" class="form-control" id="marcaVeiculo" name="marcaVeiculo" value="<?= $marca; ?>" required>
    </div>
    <br />
    <div class="form-group">
      <label for="modeloVeiculo">Modelo do Veículo:</label>
      <input type="text" class="form-control" id="modeloVeiculo" name="modeloVeiculo" value="<?= $modelo; ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="corVeiculo">Cor:</label>
      <input type="text" class="form-control" id="corVeiculo" name="corVeiculo" value="<?= $cor; ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="anoFabricacaoVeiculo">Ano de fabricação do Veículo:</label>
      <input type="text" class="form-control" id="anoFabricacaoVeiculo" name="anoFabricacaoVeiculo" value="<?= $ano_fabricacao; ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="AnoModeloVeiculo">Ano do Modelo:</label>
      <input type="text" class="form-control" id="AnoModeloVeiculo" name="AnoModeloVeiculo" value="<?= $ano_modelo; ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="combustivelVeiculo">Combustível do Veículo:</label>
      <input type="text" class="form-control" id="combustivelVeiculo" name="combustivelVeiculo" value="<?= $combustivel; ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="precoVeiculo">Preço do Veículo:</label>
      <input type="number" min="0.00" step=0.01 class="form-control" id="precoVeiculo" name="precoVeiculo" value="<?= $preco; ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="detalhesVeiculo">Detalhes do Veículo:</label>
      <input type="text" class="form-control" id="detalhesVeiculo" name="detalhesVeiculo" value="<?= $detalhes; ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="fotoVeiculo">Foto do Veículo:</label>
      <input type="file" accept="image/*" class="form-control" id="fotoVeiculo" name="fotoVeiculo">
    </div>
    <br />    
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="Veiculo-insert.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
  </form>
</div>



<?php require_once "footer_inc.php"; ?>