<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teinda de camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <!-- CABECERA -->
    <header id="header">
        <div id="logo">
            <img src="assets/img/camiseta.png" alt="Tienda de camisetas">
            <a href="index.php">
                Tienda de camisetas.
            </a>
        </div>
    </header>
    <!-- MENU -->
    <nav id="menu">
        <ul>
            <li>Inicio</li>
            <li>Categoria 1</li>
            <li>Categoria 2</li>
            <li>Categoria 3</li>
            <li>Categoria 4</li>
            <li>Categoria 5</li>
        </ul>
    </nav>
    
    <div id="content">
        <!-- BARRA LATERAL -->
        <aside id="lateral">
            <div id="login" class="block_aside">
                <form action="#" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="Enviar">
                </form>
                <a href="#">Mis pedidos</a>
                <a href="#">Gestionar pedidos</a>
                <a href="#">Gestionar categorias</a>
            </div>
        </aside>

        <!-- CONTENIDO CENTRAL -->
        <div id="central">
            <h1>Productos destacados</h1>
            <div class="product">
                <img src="assets/img/camiseta.png" alt="">
                <h2>Camiseta Azul Olgada ancha</h2>
                <p>30 euros</p>
                <a href="#" class="button">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta.png" alt="">
                <h2>Camiseta Azul Olgada ancha</h2>
                <p>30 euros</p>
                <a href="#" class="button">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta.png" alt="">
                <h2>Camiseta Azul Olgada ancha</h2>
                <p>30 euros</p>
                <a href="#" class="button">Comprar</a>
            </div>
        </div>
    </div>
    <!-- PIE DE PAGINA -->
    <footer id="footer">
        <p>Desarrollado por Nicolas Carrasco Cares &copy; <?=date('Y')?></p>
    </footer>
</body>

</html>