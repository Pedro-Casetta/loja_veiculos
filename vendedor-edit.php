<?php

$flag_msg = null;
$msg = "";
require "classes/Vendedor.php";

if (isset($_GET['codigo'])) 
{
        require "connection.php";
        $codigo = $_GET['codigo'];

        $sql = "SELECT * FROM vendedor WHERE codigo = :codigo";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Vendedor");

        $vendedor = $stmt->fetch();
}

if (isset($_POST["enviar"])) 
{
  try 
  {
    require("connection.php");

    $codigo = $_GET['codigo'];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $foto = $_POST['foto'];
    
    $sql = "UPDATE vendedor SET nome = :nome, email = :email, telefone = :telefone, celular = :celular, foto = :foto WHERE codigo = :codigo";
    $stmt = $conn->prepare($sql);
                            
    $stmt->bindParam(':codigo', $codigo);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':celular', $celular);
    $stmt->bindParam(':foto', $foto);

    $stmt->execute();

    $flag_msg = true; // Sucesso 
    $msg = "Dados enviados com sucesso!";

  } 
  catch(PDOException $e) 
  {
    $flag_msg = false; //Erro 
    $msg = "Erro na conexão com o Banco de dados: " . $e->getMessage();
  }
  
  $conn = null;
}

require_once "header_inc.php";

?>


<div class="container px-4 py-5" id="icon-grid">
  <h2 class="pb-2 border-bottom">Edição dos dados dos Vendedores</h2>
  <br/>
    <div class="container">
    
    <?php 
        if (!is_null($flag_msg)) 
        {
            if ($flag_msg) 
            {
                echo "<div class='alert alert-success' role='alert'>$msg</div>"; 
            }
            else
            {
                echo "<div class='alert alert-warning' role='alert'>$msg</div>"; 
            }
        }
    ?>
    <form method="POST">

        <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= $vendedor->__get('nome'); ?>" required></input>
        </div>
        <br />
        <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $vendedor->__get('email'); ?>" required></input>
        </div>
        <br />
        <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $vendedor->__get('telefone'); ?>" required></input>
        </div>
        <br />
        <div class="form-group">
        <label for="celular">Celular:</label>
        <input type="text" class="form-control" id="celular" name="celular" value="<?= $vendedor->__get('celular'); ?>" required></input>
        </div>
        <br />
        <div class="row">
            <div class="col-md-10">
                <label for="foto">Foto:</label>
                <input type="text" class="form-control" id="foto" name="foto" value="<?= $vendedor->__get('foto'); ?>"></input>

            </div>
            <div class="col-md-2">
                <img src="<?= $vendedor->__get('foto'); ?>" alt="" width="90">
            </div>
        </div>
        <br />
        <a href="vendedor-list.php"><button type="button" class="btn btn-primary mb-2" name="voltar">Voltar</button></a>
        <button type="submit" class="btn btn-success mb-2" name="enviar">Atualizar</button>
        <a href="vendedor-edit.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>

    </form>
    </div>
</div>



<?php require_once "footer_inc.php"; ?>