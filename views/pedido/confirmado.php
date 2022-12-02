<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>

    <h1>Tu pedido ha sido confirmado</h1>

    <p>Tu pedido ha sido guardado con exito, una vez validada la transferencia con el monto del pedido, se realizara el envio de sus productos a la dirección ingresada. Gracias por tu compra!!</p>
    <br>
    <?php if (isset($pedido)) : ?>
        <h3>Datos del pedido</h3>
        <br>

        Número del pedido: <?= $pedido->id ?><br>
        <br>
        Productos:
        <table class="table">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <?php while ($producto = $productos->fetch_object()) : ?>
                <tr>
                    <td>
                        <?php if ($producto->imagen != null) : ?>
                            <img class="img_carrito" src="<?= base_url ?>uploads/imagenes/<?= $producto->imagen ?>" alt="">
                        <?php else : ?>
                            <img class="img_carrito" src="<?= base_url ?>assets/img/camiseta.png" alt="">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url ?>producto/ver/<?= $producto->id ?>"><?= $producto->nombre ?></a>
                    </td>
                    <td>
                        <?= $producto->precio ?>
                    </td>
                    <td>
                        <?= $producto->unidades ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <strong>Total a pagar: <?= $pedido->coste ?></strong>
    <?php endif; ?>
<?php elseif (!isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>

    <p>Tu pedido no ha sido procesado</p>

<?php endif; ?>