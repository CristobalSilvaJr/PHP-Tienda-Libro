<?php
    
    $usuario="root";
    $password="";



           try {
           $pdo= new PDO("mysql:host=localhost;dbname=sesiones",$usuario,$password);          
           } catch (PDOException $error) {
               die ("Error".$error->getMessage());
           } 
        
    
  
?>  