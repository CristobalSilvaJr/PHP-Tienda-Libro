<?php
     session_start();
     require 'mysql.php';
     if (isset($_SESSION['id_usuario'])) {
        $consulta = $pdo->prepare('SELECT id, usuario, contraseña FROM guardar_sesion WHERE id = :id');
        $consulta->bindParam(':id', $_SESSION['id_usuario']);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
   
        $user=null;
    if (is_countable($resultado) > 0) {
        $user=$resultado;
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
        <div class="container h2 text-center">

    <?php if(!empty($user)): ?>
         <br>Bienvenido. <?= $user['usuario']; ?>        
      <br>¡Has ingresado exitosamente!
      <br>Para ingresar a la pagina de compra, pincha <a href="Tienda/index2.php">Aqui</a> o
      <br>si deseas salir pincha<a href="salirSesion.php">
        Aca
      </a>
    <?php else: ?>
            <h1>¡Error!</h1>
            <a href="iniciarS.php">Intentar nuevamente</a> or
            <a href="crearS.php">Crear una nueva cuenta</a>

        <?php endif; ?>
        </div>
</body>
</html>