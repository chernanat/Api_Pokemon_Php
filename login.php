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
    <title>LOG IN</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <h2>LOGIN</h2>
    <form class="form-control" action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <h3>INICIO DE SESION</h3>
        <div>
            <label class="form-label" for="">Correo:</label>
            <input class="form-control" type="email" name="correo" id="correo">
        </div>
        <div>
            <label class="form-label" for="">Contraseña:</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="d-grid gap-2">
            <input class="btn btn-success" type="submit" name="iniciar" value="INICIAR SESION">
        </div>
    </form>
    <div class="d-grid gap-1">
        <a class="btn btn-secondary" class="regis" href="http://localhost/prueba%20tecnica%20accedo/registro.php">REGISTRARSE</a>
    </div>
</body>
</html>
<?php
include('db.php');

if(isset($_POST['iniciar']) && ($_POST['correo']) != '' && ($_POST['password']) != ''){
    $email = $_POST['correo'];
    try{
        $base = new PDO("mysql:host=localhost; dbname=db_prueba_tecnica","root","");
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
        $sql_total1 ="SELECT * FROM `usuarios` WHERE `email` = '$email' LIMIT 1";
        $resultado = $base->prepare($sql_total1);
        $resultado->execute();
        $consulta = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $c = false;
        foreach($consulta as $resultado){
            if($resultado['email'] && password_verify($_POST['password'],$resultado['password'])){
                $c = true;
                session_start();
                $_SESSION['usuario'] = $email;
                header('Location:http://localhost/prueba%20tecnica%20accedo/index.php');
            }
        }
        if($c == false){
            echo "<div class='alert alert-dismissible alert-danger'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        <strong>Este Usuario no esta Registrado!</strong>
      </div>";
        }
    }catch(Exception $e){
        echo "linea de error: ".$e->getLine()." ".$e->getMessage();
        return $e;
    }
}
elseif(isset($_POST['iniciar']) && ($_POST['correo']) == '' && ($_POST['password']) == ''){
    echo "<div class='alert alert-dismissible alert-danger'>
    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    <strong>Todos los campos deben estar llenos!</strong>
  </div>";
}
?>