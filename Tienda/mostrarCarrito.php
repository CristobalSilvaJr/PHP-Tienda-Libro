<!-- Muestra la cabecera de la pagina -->
<?php
     include 'conexion/conexionTienda.php';
     include 'carrito.php';
     include 'cabecera.php';
?>

<br>
<h3>Lista del carrito</h3>
<?php
     if (!empty($_SESSION['carrito'])){?>
<table class="table table-primary table-bordered">
    <tbody>
        <tr>
            <th width="40%">Nombre</th>
            <th width="15%">Cantidad</th>
            <th width="20%">Precio</th>
            <th width="20%">Total</th>
            <th width="5%">--</th>
        </tr>
        <?php $total=0;?>
        <!-- Inicio de foreach para recorrer la base de datos -->
        <?php  foreach($_SESSION['carrito'] as $indice=>$libro2){ ?>
        <tr>
            <td width="40%"><?php echo $libro2['Nombre'] ?></td>
            <td width="15%" class="text-center"><?php echo $libro2['Cantidad'] ?></td>
            <td width="20%" class="text-center"><?php echo "$".$libro2['Precio'] ?></td>
            <td width="20%" class="text-center"><?php echo "$".number_format($libro2['Precio']*$libro2['Cantidad'],3);  ?></td>

            <form action="" method="post">
            <input type="hidden" name="id" id="id"  value="<?php echo openssl_encrypt($libro2['ID'],COD,KEY)  ?>">
            <td width="5%"><button class="btn btn-danger"  name="btnAccion" value="Eliminar" type="submit">Eliminar</button></td>
            </form>
        </tr>
        <?php $total= $total+($libro2['Precio']*$libro2['Cantidad']); ?> <!-- Variable creada para dar resultado del total-->
        <!-- Termino del foreach -->        
        <?php
             }
        ?>
        <tr>
            <td colspan="3" align="right"><h2>Total</h2></td>
            <td align="right"><h2><?php echo "$".number_format($total,3);?></h2></td>
            <td></td>
        </tr>
    </tbody>

</table>
<?php }else{ ?>

    <div class="alert alert-success">
        No hay producto en el carrito
    </div>

    <?php } ?>
<!-- Muestra el pie de pagina -->
<?php
      include 'pie.php';
 ?>