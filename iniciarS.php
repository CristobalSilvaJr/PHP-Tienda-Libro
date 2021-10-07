<?php
    session_start();
    if (isset($_SESSION['id_usuario'])) {
        header('Location: SesionCreada.php');
      }
     require 'mysql.php';
     if (!empty($_POST['usuario']) && !empty($_POST['contrase'])) {
         $consulta= $pdo->prepare('SELECT id,usuario,contraseña FROM guardar_sesion WHERE usuario=:usuario');
         $consulta->bindParam(':usuario',$_POST['usuario']);
         $consulta->execute();
         $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
         $mensaje='';
         if (is_countable($resultado) > 0 && password_verify($_POST['contrase'], $resultado['contraseña'])) {
             $_SESSION['id_usuario']= $resultado['id'];
             header("Location: SesionCreada.php");
         }else{
            $mensaje='Usuario o contraseña incorrecto, por favor vuelva a intentarlo.';
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
    <title>Login</title>
</head>
<body>

    <form action="iniciarS.php" method="POST">
    <div class="container">
        <h3 class="text-center">Inicio de Sesion</h3>  
            <!-- Codigo PHP -->
            <?php if (!empty($mensaje)): ?>
            <p> <?= $mensaje ?></p>
            <?php endif; ?>   
        Usuario: <input class="form-control col-lg-4" type="text" placeholder="Cristobal" name="usuario">
        Contraseña: <input class="form-control col-lg-4" type="password" placeholder="*********" name="contrase">
        <span>Si no tienes una cuenta, <a href="crearS.php">¡crea una aqui!</a></span>
        <br>
        <button class="btn btn-primary" type="submit" >Iniciar Sesion</button>
       
  
    </div><!--container -->
</form>    
</body>
</html>