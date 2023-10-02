<?php

$nome = "";
$email = "";
$telefone = "";
$celular = "";
$foto = "";
$flag_msg = null;
$msg = "";

if (isset($_POST["enviar"])) {
  try {
    require("connection.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $foto = $_POST["foto"];
    
    if (empty($_POST["nome"]) || empty($_POST["email"]) || empty($_POST["foto"])) {
      $flag_msg = false; //Erro 
      $msg = "Dados incompletos, preencha o formulário telefoneretamente!";
    } else {
      $stmt = $conn->prepare("INSERT INTO vendedor (nome, email, telefone, celular, foto) VALUES (:nome, :email, :telefone, :celular, :foto)");
                              
      $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
      $stmt->bindParam(":email", $email, PDO::PARAM_STR);
      $stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
      $stmt->bindParam(":celular", $celular);
      $stmt->bindParam(":foto", $foto, PDO::PARAM_STR);

      $stmt->execute();

      $flag_msg = true; // Sucesso 
      $msg = "Dados enviados com sucesso!";
      $nome = "";
      $email = "";
      $telefone = "";
      $celular = "";
      $foto = "";
    }
  } catch(PDOException $e) {
    $flag_msg = false; //Erro
    $msg = "Erro na conexão com o Banco de dados: " . $e->getMessage();
  }
  
  $conn = null;
}

require_once "header_inc.php"; ?>


<div class="container px-4 py-5" id="icon-grid">
  <h2 class="pb-2 border-bottom">Inclusão de Vendedores</h2>
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
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="<?= $nome; ?>" required>
    </div>
    <br />
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>" required>
    </div>
    <br />
    <div class="form-group">
      <label for="telefone">Telefone:</label>
      <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $telefone; ?>" required>
    </div>
    <br />
    <div class="form-group">
      <label for="celular">Celular:</label>
      <input type="text" class="form-control" id="celular" name="celular" value="<?= $celular; ?>" required>
    </div>
    <br />
    <div class="form-group">
      <label for="foto">Caminho da Foto (Ex: images/alex.jpeg):</label>
      <input type="text" class="form-control" id="foto" name="foto" required>
    </div>
    <br />
    <a href="vendedor-list.php"><button type="button" class="btn btn-primary mb-2" name="voltar">Voltar</button></a>
    <button type="submit" class="btn btn-success mb-2" name="enviar">Enviar</button>
    <a href="vendedor-insert.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>

  </form>
</div>



</div>










<?php require_once "footer_inc.php"; ?>