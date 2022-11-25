<h1>Crear nuevo Producto</h1>
<?php $categorias = Utils::showCategorias(); ?>
<form action="<?= base_url ?>producto/save" method="post" enctype="multipart/form-data">
    <select name="categoria" id="">
    <?php while($cat = $categorias->fetch_object()):?>
        <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
    <?php endwhile;?>
    </select>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>
    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" required>
    <label for="precio">Precio</label>
    <input type="number" name="precio" required>
    <label for="stock">Stock</label>
    <input type="number" name="stock" required>
    <label for="oferta">Oferta</label>
    <input type="text" name="oferta" required>
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen">
    <input type="submit" value="Guardar">
</form>