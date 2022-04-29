<?php
session_start();
if(isset($_SESSION['usuario'])) {
    header('location: index.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Bienvenido al registro</h1>
    <form  class="form-control" action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label class="form-label" for="">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email">
        </div>
        <div>
            <label class="form-label" for="">Contraseña</label>
            <input class="form-control" type="password" name="contra" id="contra" placeholder="Contraseña">
        </div>
        <br>
        <div class="d-grid gap-2">
            <input class="btn btn-success" name="registrar" type="submit" value="REGISTRAR">
        </div>
        <div class="d-grid gap-2">
            <a class="btn btn-info" href="http://localhost/prueba%20tecnica%20accedo/login.php">VOLVER</a>
        </div>
    </form>
</body>
</html>

<?php
include('db.php');
if(isset($_POST['registrar']) && ($_POST['email']) != '' && ($_POST['contra']) != ''){
    $db = new Consultas_Db;
    $usuario = $_POST['email'];
    $password = password_hash($_POST['contra'],PASSWORD_DEFAULT);
    $db->Registrar_Usuario($usuario,$password);

    if ($db->Registrar_Usuario($usuario,$password) == 1){
        echo "<div class='alert alert-dismissible alert-success'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        <strong>Usuario Registrado Correctamente!</strong>
      </div>";
    }
}
elseif(isset($_POST['registrar']) && ($_POST['email']) == '' && ($_POST['contra']) == ''){
    echo "<div class='alert alert-dismissible alert-danger'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        <strong>Todos los campos deben estar llenos!</strong>
      </div>";
    }
?>