<?php
#PROBANDO CONEXION A LA DB
try{
    $base = new PDO("mysql:host=localhost; dbname=db_prueba_tecnica","root","");
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
}catch(Exception $e){
    echo "linea de error: ".$e->getLine()." ".$e->getMessage();
}
class Consultas_Db{
    #registro de usuarios
    function Registrar_Usuario($email,$password){
        try{
            $base = new PDO("mysql:host=localhost; dbname=db_prueba_tecnica","root","");
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");
            $sql_total1 ="INSERT INTO `usuarios`(email,password) VALUES(:email,:password)";
            $resultado = $base->prepare($sql_total1);
            $resultado->bindParam(':email', $email, PDO::PARAM_STR);
            $resultado->bindParam(':password', $password, PDO::PARAM_STR);
            $resultado->execute();
            return 1;
        }catch(Exception $e){
            echo "linea de error: ".$e->getLine()." ".$e->getMessage();
            return $e;
        }
    }
    #Iniciar sesion
    function Iniciar_Sesion($email,$password){
        try{
            $base = new PDO("mysql:host=localhost; dbname=db_prueba_tecnica","root","");
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");
            $sql_total1 ="SELECT * FROM `usuarios` WHERE `email` = '$email' AND  `password` = '$password'";
            $resultado = $base->prepare($sql_total1);
            $resultado->execute();
            $consulta = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $consulta;
        }catch(Exception $e){
            echo "linea de error: ".$e->getLine()." ".$e->getMessage();
            return $e;
        }
    }
}
?>