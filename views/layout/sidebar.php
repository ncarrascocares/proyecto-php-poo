<aside id="lateral">

    <div id="carrito" class="block_aside">
        <h3>Mi carrito</h3>
        <ul>
            <?php $stats = Utils::statsCarrito(); ?>
            <li><a style="text-decoration: none;" href="<?= base_url ?>carrito/index">Productos: <?=$stats['count'];?></a></li>
            <li><a style="text-decoration: none;" href="<?= base_url ?>carrito/index">Total: $<?=$stats['total'];?></a></li>
            <li><a style="text-decoration: none;" href="<?= base_url ?>carrito/index">Ver el carrito</a></li>
        </ul>
    </div>
    <div id="login" class="block-aside">
        <?php if (!isset($_SESSION['identity'])) : ?>
            <h3>Entrar a la web</h3>
            <form action="<?= base_url ?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Password</label>
                <input type="password" name="password">
                <input type="submit" value="Enviar">
            </form>
        <?php else : ?>
            <h3><?= $_SESSION['identity']->nombre . " " . $_SESSION['identity']->apellidos ?></h3>
        <?php endif; ?>
        <ul>

            <!-- Validación para mostrar opciones en caso de login de un usuario admin -->
            <?php if (isset($_SESSION['admin'])) : ?>
                <li><a style="text-decoration: none;" href="<?= base_url ?>categoria/index">Gestionar Categorias</a></li>
                <li><a style="text-decoration: none;" href="<?= base_url ?>producto/gestion">Gestionar Productos</a></li>
                <li><a style="text-decoration: none;" href="#">Gestionar Pedidos</a></li>
            <?php endif; ?>

            <!-- Opciones que apareceran solo si se reaiza un login -->
            <?php if (isset($_SESSION['identity'])) : ?>
                <li><a style="text-decoration: none;" href="#">Mis pedidos</a></li>
                <li><a style="text-decoration: none;" href="<?= base_url ?>usuario/logout">Cerrar Sesión</a></li>
                <!-- Opcion que aparecera a usuarios no sin perfil creado -->
            <?php else : ?>
                <li><a style="text-decoration: none;" href="<?= base_url ?>usuario/registro">Registrate aqui</a></li>
            <?php endif; ?>
        </ul>
    </div>
</aside>
<!--Contenido central-->
<div id="central">