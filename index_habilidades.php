<?php
session_start();
include('api_pokemon.php');
$id = $_GET['id'];
$api = new Api_Pokemon;
$nose = $api->Pokemon($id);
$imagen = ($nose->sprites->front_default);
$imagen2 = ($nose->sprites->back_default);
$habilidad = ($nose->abilities);
$nombre = ($nose->forms[0]->name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <h1> Usuari@ en Sesion: <b><?php echo($_SESSION['usuario'])?></b></h1>
    <table class="table table-hover">
        <thead>
          <tr class="table-danger">
            <th scope="col">Nombre Pokemon</th>
            <th scope="col">Imagenes Pokemon</th>
          </tr>
        </thead>
        <tbody>
          <tr class="table-success">
            <td scope="row"><h3><b><?php echo $nombre; ?></b></h3></td>
            <td><img src="<?php echo $imagen; ?>" alt="" width="120" height="120">
                <img src="<?php echo $imagen2; ?>" alt="" width="120" height="120"></td>
        <br>
          </tr>
        </tbody>
    </table>
    <h2>Habilidades: </h2>
    <?php
    foreach($nose->abilities as $habilidades){
    ?>
    <ul><li> <h3><b><?php echo($habilidades->ability->name); echo "\n"?></b></h3></li></ul>
    <?php
    }
    ?>
    <div class="d-grid gap-1">
    <a class="btn btn-outline-info" class="regis" href="http://localhost/prueba%20tecnica%20accedo/index.php">Volver a Lista  de Pokemones</a>
    </div>
    <br>
</body>
<footer class="bg-dark text-center text-white">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Desarrollado por Carlos Quesada 2022.
      </div>
</footer>
</html>
<?php
if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
}
?>
