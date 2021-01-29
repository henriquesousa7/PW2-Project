<?php
    require 'Classes/Marca.php'; 
    require 'Classes/Carro.php'; 
    
    $marca = new Marca();

    $allMarcas = $marca->selectAll();
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
                        	<label for="modelo">Modelo</label>
               				<input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" required>
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                			<input type="number" class="form-control" id="valor" name="valor" placeholder="Valor" required>
                        </div>
                        <div class="form-group">
                         	<label for="cor">Cor</label>
                			<input type="text" class="form-control" id="cor" name="cor" placeholder="Cor" required>
                        </div>
                        <div class="form-group">
                            <label for="marcas">Marca</label>
                            <select class="form-control" name="marcas" id="marcas" required>
                                <?php foreach($allMarcas as $marca): ?>
                                    <option value="<?= $marca["id"] ?>"><?= $marca["nome"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark" name="insertButton">Enviar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>

<?php

    $carro = new Carro();
    
    if(isset($_POST['insertButton'])){
        $carro->setModelo($_POST["modelo"]);
        $carro->setValor($_POST["valor"]);
        $carro->setCor($_POST["cor"]);
        $carro->setMarca($_POST["marcas"]);

        $carro->insertCarro();
    }
?>