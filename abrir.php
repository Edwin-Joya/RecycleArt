<?php
require 'database.php';
$message='';
if (!empty($_POST['email'])&& !empty($_POST['password'])) {
    $sql= "INSERT INTO  usuarios(nombre,email,pass) VALUES(:nombre,:email,:pass)";
    $stament=$conn->prepare($sql);
    $stament->bindparam(':nombre',$_POST['nombre']);
    $stament->bindparam(':email',$_POST['email']);
    $password=password_hash($_POST['pass'],PASSWORD_BCRYPT);
    $stament->bindparam(':pass',$password);
    if ($stament->execute()) {

        $message='usuario creado';
        
    }else {
        $message='Error , revisa tu contraseña';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php 
    
    ?>

    <?php 
     if (!empty($message)): ?>
        <p><?php $message ?></p>
     <?php endif; ?>

    <form action="login.php" method="post">
        <h2>ingresa tus datos</h2>
        
        <div >
            <input type="text" name='nombre' placeholder="nombre" >
        </div>
        <div>
            <input type="text" name='email' placeholder="correo" >
        </div>
        <div>
            <input type="text" name='pass' placeholder="contraseña" >
        </div>
        <div>
            <input type="submit" placeholder="enviar" >
        </div>

    </form>
    
    </body>
</html>