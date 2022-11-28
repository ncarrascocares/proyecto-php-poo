<h1>Algunos de nuetros productos!</h1>
<?php while ($pro = $producto->fetch_object()) : ?>
    <div class="product">
        <a href="<?=base_url?>producto/ver/<?=$pro->id?>">
            <?php if ($pro->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/imagenes/<?= $pro->imagen ?>" alt="">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="">
            <?php endif; ?>
            <h2><?= $pro->nombre ?></h2>
        </a>
        <p><?= $pro->precio ?></p>
        <a href="#" class="button">Comprar</a>
    </div>
<?php endwhile; ?>