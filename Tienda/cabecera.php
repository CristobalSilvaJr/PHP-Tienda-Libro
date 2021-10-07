<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link  rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css2/style.css">

    <title>Shop</title>
</head>
<body>
    <div class="container-fluid">
    <!-- Cabecera -->
    <header class="header">
        <a href="index2.php">
            <img class="header__logotipo" src="image/logo.png" alt="logotipo">
        </a>
    </header>

    <!-- Navegacion -->
    
   
    <nav class="navegacion">
       
        <a class="navegacion__enlace navegacion__enlace--activo" href="index2.php">Inicio</a>
        <a class="navegacion__enlace " href="nosotros.php">Nosotros</a>
        <a class="navegacion__enlace" href="mostrarCarrito.php">Carrito(<?php
             echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
        ?>)</a>
    <a class="navegacion__enlace" href="/php poo/semana6/iniciarS.php">Salir</a>       

    </nav>    <!-- .navegacion -->
    <div class="container">
        