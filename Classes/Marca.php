<?php

require "Classes/Conexao.php";

class Marca {

    private $id;
    private $nome;
    private $paisOrigem;
    private $valorMercado;
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

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setPaisOrigem($paisOrigem) {
        $this->paisOrigem = $paisOrigem;
    }

    public function getPaisOrigem() {
        return $this->paisOrigem;
    }

    public function setValorMercado($valorMercado) {
        $this->valorMercado = $valorMercado;
    }

    public function getValorMercado() {
        return $this->valorMercado;
    }

    public function selectAll(){
        // Prepara o comando SQL
        $sql = "SELECT * FROM marca";        

        // Executa a query           
        $resultado = mysqli_query($this->con, $sql);
        
        // Armazena os dados em um array
        $produtos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        // Libera o $resultado da memória
        mysqli_free_result($resultado);

        return $produtos;
    }

    private function openConexao(){
        $this->conn = new Conexao();
    }

    function __destruct(){
        mysqli_close($this->conn);   
    }
}