<?php if (isset($_SESSION['identity'])) : ?>
    <?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == "complete"):?>
    <strong id="content" class="alert alert_green">Pedido creado correctamente</strong>
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != "complete"):?>
    <strong class=" alert alert_red">El Pedido No se ha creado correctamente</strong>
<?php endif;?>
<?php Utils::deleteSesion('pedido'); ?>

    <h1>Hacer pedido</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a>    
    </p>
    <br>
    <h3>Dirección para el envío</h3>
    <form action="<?= base_url ?>pedido/add" method="post">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" value="" required>
        <label for="localidad">Ciudad</label>
        <input type="text" name="localidad" value="" required>
        <label for="ciudad">Dirección</label>
        <input type="text" name="direccion" value="" required>
        <input type="submit" value="Confirmar pedido">
    </form>

<?php else : ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logeado en la web para poder realizar tu pedido</p>
<?php endif ?>