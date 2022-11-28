<?php if (isset($categoria)) : ?>
    <h1><?= $categoria->nombre ?></h1>
    <?php if ($producto->num_rows == 0) : ?>
        <h1>No hay productos en esta categoria</h1>
    <?php else : ?>
        <?php while ($pro = $producto->fetch_object()) : ?>
            <div class="product">
                <?php if ($pro->imagen != null) : ?>
                    <img src="<?= base_url ?>uploads/imagenes/<?= $pro->imagen ?>" alt="">
                <?php else : ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png" alt="">
                <?php endif; ?>
                <h2><?= $pro->nombre ?></h2>
                <p><?= $pro->precio ?></p>
                <a href="#" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>

    <?php endif; ?>

<?php else : ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>