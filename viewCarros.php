<?php
    require 'Classes/Carro.php'; 
    require 'Classes/Marca.php';
    
    $carro = new Carro();

    $allCarros = $carro->selectAll();
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
                    <th>Modelo</th>
                    <th>Valor</th>
                    <th>Cor</th>
                    <th>Marca</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id='carros'>
                <?php foreach ($allCarros as $carro): ?>
                    <tr>
                        <td><?php echo $carro['id'];?></td>
                        <td><?php echo $carro['modelo'];?></td>
                        <td><?php echo $carro['valor'];?></td>
                        <td><?php echo $carro['cor'];?></td>
                        <?php
                            $marca = new Marca(); 
                            $marca->setId($carro['marca']);
                            $marca1 = $marca->selectById();
                        ?>
                        <td><?php echo $marca1[0]['nome'];?> - <?php echo $marca1[0]['paisOrigem'];?> - <?php echo $marca1[0]['valorMercado'];?></td>
                        <td>
                            <a href="viewCarros.php?id=<?php echo $carro['id']; ?>&&metodo=delete">
                                <button class="btn btn-dark text-center" name="delete">Excluir</button>
                            </a>
                            <a href="updateCarros.php?id=<?php echo $carro['id']; ?>&&metodo=edit">
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

    $carro1 = new Carro();
    
    if(isset($_GET['id']) && $_GET['metodo'] == "delete"){
        $carro1->setId($_GET['id']);
        $carro1->deleteCarro();
        header("Location: index.php");
    }
?>