<?php

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

    public function insertCarro(){ 
        
        // Prepara o comando SQL
        $sql = "INSERT INTO carro (modelo, valor, cor, marca) 
                VALUES('{$this->modelo}',
                       '{$this->valor}',
                       '{$this->cor}',
                       '{$this->marca}')";

        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function selectAll(){
        // Prepara o comando SQL
        $sql = "SELECT * FROM carro";        

        // Executa a query           
        $resultado = mysqli_query($this->conn, $sql);
        
        // Armazena os dados em um array
        $carros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        // Libera o $resultado da memória
        mysqli_free_result($resultado);

        return $carros;
    }

    public function selectById(){
        // Prepara o comando SQL
        $sql = "SELECT * FROM carro Where id = $this->id";        

        // Executa a query           
        $resultado = mysqli_query($this->conn, $sql);
        
        // Armazena os dados em um array
        $carro = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        // Libera o $resultado da memória
        mysqli_free_result($resultado);

        return $carro;
    }

    public function deleteCarro(){ 
        
        // Prepara o comando SQL
        $sql = "DELETE FROM carro WHERE id = '{$this->id}'";

        // Executa o comando SQL
        if(!mysqli_query($this->conn, $sql)){
            echo "Ocorreu um erro: " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function updateCarro(){ 
        
        // Prepara o comando SQL
        $sql = "UPDATE carro 
                SET modelo = '{$this->modelo}', 
                valor = '{$this->valor},'
                cor = '{$this->cor},'
                marca = '{$this->marca}' 
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