<?php
    require 'Classes/Carro.php'; 
    require 'Classes/Marca.php';
    
    $marca = new Marca();

    $allMarcas = $marca->selectAll();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>View</title>
    <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
	
    <h3 class="text-center pt-5">Lista Carros</h3>
    <a class="row d-flex justify-content-center" href="index.php" class="button">
            <button type="button" class="btn btn-dark">Pagina Inicial</button>
    </a>
    <div class="container mt-3">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-fill">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>País de Origem</th>
                    <th>Valor de Mercado</th>
                    <th>Acao</th>
                </tr>
            </thead>
            <tbody id='carros'>
                <?php foreach ($allMarcas as $marca): ?>
                    <tr>
                        <td><?php echo $marca['id'];?></td>
                        <td><?php echo $marca['nome'];?></td>
                        <td><?php echo $marca['paisOrigem'];?></td>
                        <td><?php echo $marca['valorMercado'];?></td>
                        <td>
                            <a href="viewMarcas.php?id=<?php echo $marca['id']; ?>&&metodo=delete">
                                <button class="btn btn-dark text-center" name="delete">Excluir</button>
                            </a>
                            <a href="updateMarcas.php?id=<?php echo $marca['id']; ?>&&metodo=edit">
                                <button id="editar" class="btn btn-dark text-center" name="editar">Editar</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
	</div>
</body>
</html>

<?php

    $marca1 = new Marca();
    
    if(isset($_GET['id']) && $_GET['metodo'] == "delete"){
        $marca1->setId($_GET['id']);
        $marca1->deleteMarca();
        header("Location: index.php");
    }
?>