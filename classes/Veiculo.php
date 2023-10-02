<?php

Class Veiculo {
    private int $codigo;
    private string $marca;
    private string $modelo;
    private string $cor;
    private int $ano_fabricacao;
    private int $ano_modelo;
    private string $combustivel;
    private float $preco;
    private string $detalhes;
    private string $foto;
    private string $tipo;



    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}


?>