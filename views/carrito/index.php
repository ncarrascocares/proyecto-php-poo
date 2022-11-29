<h1>Carrito de la compra</h1>

<table class="table">
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php
    foreach ($carrito as $indice => $elemento) :
        $producto = $elemento['producto'];
    ?>

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
                <?= $elemento['unidades'] ?>
            </td>
        </tr>


    <?php endforeach; ?>
</table>
<br>
<div class="total-carrito">
    <?php $stats = Utils::statsCarrito() ?>
    <h3>Precio total: $<?= $stats['total'] ?></h3>
    <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
</div>