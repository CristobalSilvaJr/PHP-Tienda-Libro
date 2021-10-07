<?php
session_start();
     $mensaje='';

     if (isset($_POST['btnAccion'])) {
       switch ($_POST['btnAccion']) {
        case 'Agregar':
            if (is_numeric(openssl_decrypt( $_POST['id'],COD,KEY))) {
                $Id=openssl_decrypt( $_POST['id'],COD,KEY);
                $mensaje='Id Correcto'.$Id;
            }else{
                $mensaje='Id Incorrecto';
            }
            if (is_string(openssl_decrypt( $_POST['nombre'],COD,KEY))) {
                $NOMBRE=openssl_decrypt( $_POST['nombre'],COD,KEY);
                $mensaje="Nombre".$NOMBRE;
            }else{
                $mensaje="Error nombre"; break;}

                if (is_string(openssl_decrypt( $_POST['cantidad'],COD,KEY))) {
                    $CANTIDAD=openssl_decrypt( $_POST['cantidad'],COD,KEY);
                    $mensaje="Cantidad".$CANTIDAD;
                }else{
                    $mensaje="Error cantidad"; break;}
                    if (is_string(openssl_decrypt( $_POST['precio'],COD,KEY))) {
                        $PRECIO=openssl_decrypt( $_POST['precio'],COD,KEY);
                        $mensaje="Precio".$PRECIO;
                    }else{
                        $mensaje="Error precio"; break;}
                        
                if (!isset($_SESSION['carrito'])) {
                $libro2= array(
                    'ID'=>$Id,
                    'Nombre'=>$NOMBRE,
                    'Cantidad'=>$CANTIDAD,
                    'Precio'=>$PRECIO
                );
                $_SESSION['carrito'][0]=$libro2;
            }else{
                $cantidadLibros=count($_SESSION['carrito']);
                $libro2= array(
                    'ID'=>$Id,
                    'Nombre'=>$NOMBRE,
                    'Cantidad'=>$CANTIDAD,
                    'Precio'=>$PRECIO
                );
                $_SESSION['carrito'][$cantidadLibros]=$libro2;

            }
            // $mensaje= print_r($_SESSION,true);
            break;
            case 'Eliminar':
                if (is_numeric(openssl_decrypt( $_POST['id'],COD,KEY))) {
                    $Id=openssl_decrypt( $_POST['id'],COD,KEY);

                  foreach($_SESSION['carrito'] as $indice=>$libro2){
                    if ($libro2['ID'] == $Id) {
                        unset($_SESSION['carrito'][$indice]);
                        echo "Elemento Borrado !";
                        break;
                    }
                  }
                }else{
                   $mensaje="Incorrecto";
                   
                }
                
                break;
    }
    }
?>