<?php
require "mysql.php";

    $message='';

     if (!empty($_POST['usuario']) && !empty($_POST['contrase'])) {
         $sql="INSERT INTO guardar_sesion (usuario,contraseña) VALUES (:usuario,:contrase)";
         $datos=$pdo->prepare($sql);
         $datos->bindParam(':usuario',$_POST['usuario']);
         $contrase=password_hash($_POST['contrase'],PASSWORD_BCRYPT);//Funcion para cifrar contraseña en database.
         $datos->bindParam(':contrase',$contrase);
     
     if ($datos->execute()) {

         $message= 'Usuario creado correctamente';
     } else {
         $message= 'Usuario no se pudo crear';
     }
     }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.css">

    <title>Document</title>
</head>
<body>
<?php if(!empty($message)): ?>
        <p><?= $message?></p>
        <?php endif;?>
        <form action="crearS.php" method="POST">
<div class="container">
        <h3 class="text-center">Crear Sesion</h3>
      
        Usuario: <input class="form-control col-lg-4" type="email" placeholder="Cristobal@xxxx.com" name="usuario">
        Contraseña: <input class="form-control col-lg-4" type="password" placeholder="*********" name="contrase">
        <button class="btn btn-primary" type="submit" >Crear usuario</button>
        <button class="btn btn-danger" type="submit"><a href="iniciarS.php">Iniciar Sesion</a></button>
       
  
    </div><!--container -->
    </form>
</body>
</html>