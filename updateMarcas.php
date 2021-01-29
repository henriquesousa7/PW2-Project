<?php
    require 'Classes/Marca.php'; 

    $marcaClass = new Marca();

    $marcaClass->setId($_GET["id"]);
    $marca = $marcaClass->selectById();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Cadastro</title>
    <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

	<h3 class="text-center pt-5">Cadastrar carro</h3>
    <a class="row d-flex justify-content-center" href="index.php" class="button">
            <button type="button" class="btn btn-dark">Pagina Inicial</button>
    </a>
    <div class="container contact-form">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form class="form" action="" method="post">
                        <div class="form-group">
                        	<label for="nome">Nome</label>
               				<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $marca[0]["nome"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="paisOrigem">País de Origem</label>
                			<input type="text" class="form-control" id="paisOrigem" name="paisOrigem" placeholder="País de Origem" value="<?php echo $marca[0]["paisOrigem"] ?>" required>
                        </div>
                        <div class="form-group">
                         	<label for="valorMercado">Valor de Mercado</label>
                			<input type="number" class="form-control" id="valorMercado" name="valorMercado" placeholder="Valor de Mercado" value="<?php echo $marca[0]["valorMercado"] ?>" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark" name="updateButton">Enviar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>

<?php

    $marca1 = new Marca();
    
    if(isset($_POST['updateButton'])){
        $marca1->setId($_GET["id"]);
        $marca1->setNome($_POST["nome"]);
        $marca1->setPaisOrigem($_POST["paisOrigem"]);
        $marca1->setValorMercado($_POST["valorMercado"]);

        $marca1->updateMarca();
        header("Location: index.php");
    }
?>