<?php
     session_start();
     $_SESSION['usuario']= "cristobal";
     $_SESSION['contraseña']="1234";

     echo "<a href='/php poo/semana6/index/index.html'>Pagina</a>";
     echo "Nombre:". $_SESSION['usuario'];
     echo "Contraseña:". $_SESSION['contraseña'];
?>