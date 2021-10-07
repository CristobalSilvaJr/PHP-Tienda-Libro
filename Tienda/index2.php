<?php
     include 'conexion/conexionTienda.php';
     include 'carrito.php';
     include 'cabecera.php';
?>

        <br>
        <div class="alert alert-success">
            <?php
                 echo $mensaje;
            ?>
            <a href="#" class="badge badge-success">Ver carro</a>
        </div>
    </div>

        <!-- Main -->
        <main class="contenedor ">

        <h1>Nuestros Productos</h1>

        <div class="row ">

        <!--Codigo PHP -->
               <?php
                 $sentencia= $pdo->prepare('SELECT * FROM `librosshop`');
                 $sentencia->execute();
                 $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                //  print_r($lista);
            ?>          
             <?php
                foreach($lista as $libro){ ?> 
                 <div class="grid col-lg-4">           
            <div class="card text-center">
                <img class="card-img-top" src="<?php echo $libro['Imagen'] ?>" alt="book" height="500px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $libro['Nombre'] ?></h5>
                    <p class="card-text">$<?php echo $libro['Precio'] ?></p>
                   
                    <!--Formulario-->
                    <form action="" method="POST">
                        <input type="hidden" name="id" id="id"  value="<?php echo openssl_encrypt($libro['id'],COD,KEY)  ?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($libro['Nombre'],COD,KEY)?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($libro['Precio'],COD,KEY)   ?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY) ?>">
                        <br>
                    <button class="btn btn-success" name="btnAccion" value="Agregar"  type="sumbit">Añadir al carro</button>

                    </form>
                </div>
            </div>
        </div>
                
             <?php } ?> <!-- Termino Codigo PHP-->

       
</main>    <!-- Fin Main -->

 <?php
      include 'pie.php';
 ?>