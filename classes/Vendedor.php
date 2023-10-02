<?php

Class Vendedor {
    private int $codigo;
    private string $nome;
    private string $email;
    private int $telefone;
    private int $celular;
    private string $foto;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}


?>