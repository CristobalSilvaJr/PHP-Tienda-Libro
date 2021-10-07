<?php
  define ("KEY","milibro");
  define ("COD","AES-128-ECB");
    
    $usuario="root";
    $password="";
           try {
           $pdo= new PDO("mysql:host=localhost;dbname=tiendalibros",$usuario,$password,  
           array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
           echo "<script>console.log('Conectado')</script>";        
           } catch (PDOException $error) {
               die ("Error".$error->getMessage());
           } 
        
    
  
?>  