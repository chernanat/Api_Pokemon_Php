<?php
session_start();
include('api_pokemon.php');
$api = new Api_Pokemon;
$nose = $api->Pokemones();
if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">  
            <a  class="navbar-brand" href="index.php">INICIO</a>
        </div>
        <div class="container-fluid">  
            <a  class="navbar-brand" href="cerrar_sesion.php">Cerrar Sesion</a>
        </div>
    </nav>
    <h1> Bienvenid@ <b><?php echo($_SESSION['usuario'])?></b></h1>
    <table class="table table-hover">
        <thead>
          <tr class="table-danger">
            <th scope="col">#</th>
            <th scope="col">Nombre Pokemon</th>
            <th scope="col">Operaciones</th>
          </tr>
        </thead>
        <?php 
        $conta = 0;
        foreach($nose->results as $pokemon){
            $conta ++;
        ?>
        <tbody>
          <tr class="table-success">
            <th scope="row"><h3><?php echo $conta;?></h3></th>
            <td><h3><?php echo $pokemon->name;?></h3></td>
            <td> <a target='_blank' href="http://localhost/prueba%20tecnica%20accedo/index_habilidades.php?id=<?php echo $conta ?>" class="btn btn-secondary">Ver Habilidades</a></td>
          </tr>
        </tbody>
        <?php
        }
    ?>
    </table>
</body>
<footer class="bg-dark text-center text-white">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Desarrollado por Carlos Quesada 2022.
      </div>
</footer>
</html>
