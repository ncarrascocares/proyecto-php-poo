<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
</head>

<body>
<div id="container">
    <!-- CABECERA -->
    <header id="header">
        <div id="logo">
            <img src="<?=base_url?>assets/img/camiseta.png" alt="Tienda de camisetas">
            <a href="index.php">
                Tienda de camisetas.
            </a>
        </div>
    </header>
    <!-- MENU -->
    <?php $categorias = Utils::showCategorias(); ?>
    <nav id="menu">
        <ul>
            <li><a href="<?=base_url?>">Inicio</a></li>
            
            <!-- Recorriendo la tabla de categorias y mostrando en la cabeceras -->
            <?php while($cat = $categorias->fetch_object()):?>
            <li><a href="#"><?=$cat->nombre?></a></li>
            <?php endwhile; ?>

        </ul>
    </nav>
    
    <div id="content">
