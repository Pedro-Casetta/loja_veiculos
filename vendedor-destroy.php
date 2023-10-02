<?php

if (isset($_GET['codigo'])) {
    require "connection.php";

    $codigo = $_GET['codigo'];

    $sql = "DELETE FROM vendedor WHERE codigo = :codigo";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT); 
    $stmt->execute();

    header("location: vendedor-list.php");
    exit;
}
?>