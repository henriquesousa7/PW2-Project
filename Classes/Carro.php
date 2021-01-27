<?php

require "Classes/Conexao.php";

class Carro {

    private $id;
    private $modelo;
    private $valor;
    private $cor;
    private $marca;
    private $conn;

    function __construct(){
        // Cria uma conexão com o banco de dados
        $this->openConexao();

        // Define o local da hora
        date_default_timezone_set('America/Sao_Paulo');

    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function getCor() {
        return $this->cor;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getMarca() {
        return $this->marca;
    }

    
    private function openConexao(){
        $this->conn = new Conexao();
    }

    function __destruct(){
        mysqli_close($this->conn);   
    }
}