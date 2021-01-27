<?php

class Conexao {
    
    private $host = "localhost";
    private $database = "carros_projetopw";
    private $user = "henriquesousa123pw";
    private $password = "henrique123pw";
    private $conexao;

    function __contruct(){
        $this->conexao = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        $this->conexao->set_charset("utf8");

        if(mysqli_connect_error()){
            echo "Erro na conexao com o banco de dados";
        }
    }

    function __destruct(){
        mysqli_close($this->conexao);
    }

}