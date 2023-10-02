<?php

$flag_msg = null;
$msg = "";
require "classes/Veiculo.php";

if (isset($_GET['codigo'])) {
    try {
        require "connection.php";
        $codigo = $_GET['codigo'];

        $sql = "SELECT * FROM veiculo WHERE codigo = :codigo";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Veiculo");

        $veiculo = $stmt->fetch();

    } catch (PDOException $e) {
        $flag_msg = false;
        $msg = "Erro na conexão com o Banco de dados: " . $e->getMessage();
    }
}

if (isset($_POST["enviar"])) {
  try {
    require("connection.php");

    $codigo = $_POST['codigo'];
    $marca = $_POST["marcaVeiculo"];
    $modelo = $_POST["modeloVeiculo"];
    $cor = $_POST['corVeiculo'];
    $ano_fabricacao = $_POST['anoFabricacaoVeiculo'];
    $ano_modelo = $_POST['AnoModeloVeiculo'];
    $combustivel = $_POST['combustivelVeiculo'];
    $preco = $_POST['precoVeiculo'];
    $detalhes = $_POST['detalhesVeiculo'];
    $foto = $_POST['imagemVeiculo'];
    $foto_padrao = $_POST['imagemPadrao'];
    
    if (empty($_POST["marcaVeiculo"]) || empty($_POST["modeloVeiculo"]) || empty($_POST['corVeiculo']) || empty($_POST['anoFabricacaoVeiculo']) || empty($_POST['AnoModeloVeiculo']) || empty($_POST['combustivelVeiculo']) || empty($_POST['precoVeiculo']) || empty($_POST['detalhesVeiculo'])) {
      $flag_msg = false; //Erro 
      $msg = "Dados incompletos, preencha o formulário corretamente!";
    } else if (!empty($_POST['imagemVeiculo'])) {
      $stmt = $conn->prepare("UPDATE veiculo SET marca = :marca, modelo = :modelo, cor = :cor, ano_fabricacao = :ano_fabricacao, ano_modelo = :ano_modelo, combustivel = :combustivel, preco = :preco, detalhes = :detalhes, foto = :foto WHERE codigo = :codigo");
                              
      $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
      $stmt->bindParam(':marca', $marca, PDO::PARAM_STR);
      $stmt->bindParam(':modelo', $modelo, PDO::PARAM_STR);
      $stmt->bindParam(':cor', $cor, PDO::PARAM_STR);
      $stmt->bindParam(':ano_fabricacao', $ano_fabricacao, PDO::PARAM_STR);
      $stmt->bindParam(':ano_modelo', $ano_modelo, PDO::PARAM_STR);
      $stmt->bindParam(':combustivel', $combustivel, PDO::PARAM_STR);
      $stmt->bindParam(':preco', $preco);
      $stmt->bindParam(':detalhes', $detalhes, PDO::PARAM_STR);
      $stmt->bindParam(':foto', $foto, PDO::PARAM_STR);

      $stmt->execute();

      $flag_msg = true; // Sucesso 
      $msg = "Dados enviados com sucesso!";
    } else if (empty($_POST['imagemVeiculo'])) {
      $stmt = $conn->prepare("UPDATE veiculo SET marca = :marca, modelo = :modelo, cor = :cor, ano_fabricacao = :ano_fabricacao, ano_modelo = :ano_modelo, combustivel = :combustivel, preco = :preco, detalhes = :detalhes, foto = :foto WHERE codigo = :codigo");
                              
      $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
      $stmt->bindParam(':marca', $marca, PDO::PARAM_STR);
      $stmt->bindParam(':modelo', $modelo, PDO::PARAM_STR);
      $stmt->bindParam(':cor', $cor, PDO::PARAM_STR);
      $stmt->bindParam(':ano_fabricacao', $ano_fabricacao, PDO::PARAM_STR);
      $stmt->bindParam(':ano_modelo', $ano_modelo, PDO::PARAM_STR);
      $stmt->bindParam(':combustivel', $combustivel, PDO::PARAM_STR);
      $stmt->bindParam(':preco', $preco);
      $stmt->bindParam(':detalhes', $detalhes, PDO::PARAM_STR);
      $stmt->bindParam(':foto', $foto_padrao, PDO::PARAM_STR);

      $stmt->execute();

      $flag_msg = true; // Sucesso 
      $msg = "Dados enviados com sucesso!";
    }
  } catch(PDOException $e) {
    $flag_msg = false; //Erro 
    $msg = "Erro na conexão com o Banco de dados: " . $e->getMessage();
  }
  
  $conn = null;
}

require_once "header_inc.php"; ?>




<div class="container px-4 py-5" id="icon-grid">
  <h2 class="pb-2 border-bottom">Edição de Veículo</h2>
  <br/>


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
    <input type="hidden" value="<?= $veiculo->__get('codigo'); ?>" name="codigo">
    <input type="hidden" value="<?= $veiculo->__get('foto'); ?>" name="imagemPadrao">
    <div class="form-group">
      <label for="marcaVeiculo">Marca do Veículo:</label>
      <input type="text" class="form-control" id="marcaVeiculo" name="marcaVeiculo" value="<?= $veiculo->__get('marca'); ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="modeloVeiculo">Modelo do Veículo:</label>
      <input type="text" class="form-control" id="modeloVeiculo" name="modeloVeiculo" value="<?= $veiculo->__get('modelo'); ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="corVeiculo">Cor:</label>
      <input type="text" class="form-control" id="corVeiculo" name="corVeiculo" value="<?= $veiculo->__get('cor'); ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="anoFabricacaoVeiculo">Ano de fabricação do Veículo:</label>
      <input type="text" class="form-control" id="anoFabricacaoVeiculo" name="anoFabricacaoVeiculo" value="<?= $veiculo->__get('ano_fabricacao'); ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="AnoModeloVeiculo">Ano do Modelo:</label>
      <input type="text" class="form-control" id="AnoModeloVeiculo" name="AnoModeloVeiculo" value="<?= $veiculo->__get('ano_modelo'); ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="combustivelVeiculo">Combustível do Veículo:</label>
      <input type="text" class="form-control" id="combustivelVeiculo" name="combustivelVeiculo" value="<?= $veiculo->__get('combustivel'); ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="precoVeiculo">Preço do Veículo:</label>
      <input type="number" min="0.00" step=0.01 class="form-control" id="precoVeiculo" name="precoVeiculo" value="<?= $veiculo->__get('preco'); ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="detalhesVeiculo">Detalhes do Veículo:</label>
      <input type="text" class="form-control" id="detalhesVeiculo" name="detalhesVeiculo" value="<?= $veiculo->__get('detalhes'); ?>">
    </div>
    <br />
    <div class="form-group">
      <label for="imagemVeiculo">Imagem do veículo:</label>
      <input type="file" accept="image/*" class="form-control" id="imagemVeiculo" name="imagemVeiculo">
    </div>
    <br />
    <a href="veiculo-list.php"><button type="button" class="btn btn-primary mb-2" name="voltar">Voltar</button></a>

    <button type="submit" class="btn btn-success mb-2" name="enviar">Enviar</button>
    <a href="veiculo-edit.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
  </form>
</div>
</div>



<?php require_once "footer_inc.php"; ?>