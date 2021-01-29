<?php

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

    public function insertMarca(){ 
        
        // Prepara o comando SQL
        $sql = "INSERT INTO marca (nome, paisOrigem, valorMercado) 
                VALUES('{$this->nome}',
                       '{$this->paisOrigem}',
                       '{$this->valorMercado}')";

        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function selectAll(){
        // Prepara o comando SQL
        $sql = "SELECT * FROM marca";        

        // Executa a query           
        $resultado = mysqli_query($this->conn, $sql);
        
        // Armazena os dados em um array
        $marcas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        // Libera o $resultado da memória
        mysqli_free_result($resultado);

        return $marcas;
    }

    public function selectById(){
        // Prepara o comando SQL
        $sql = "SELECT * FROM marca Where id = $this->id";        

        // Executa a query           
        $resultado = mysqli_query($this->conn, $sql);
        
        // Armazena os dados em um array
        $marca = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        // Libera o $resultado da memória
        mysqli_free_result($resultado);

        return $marca;
    }

    public function deleteMarca(){ 
        
        // Prepara o comando SQL
        $sql = "DELETE FROM marca WHERE id = '{$this->id}'";

        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function updateMarca(){ 
        
        // Prepara o comando SQL
        $sql = "UPDATE marca 
                SET nome = '{$this->nome}', 
                paisOrigem = '{$this->paisOrigem}',
                valorMercado = '{$this->valorMercado}'
                WHERE id = '{$this->id}'" ;


        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
    }

    private function openConexao(){
        $host = "localhost";
        $database = "carros_projetopw";
        $user = "admin";
        $password = "admin";
        
        $this->conn = mysqli_connect($host, $user, $password, $database);
        $this->conn->set_charset("utf8");
    
        if(mysqli_connect_errno()){
            echo "Erro na conexao com o banco de dados";
        }
    }

    function __destruct(){
        mysqli_close($this->conn);   
    }
}