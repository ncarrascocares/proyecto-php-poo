<?php if (isset($editar) && isset($pro) && is_object($pro)):?>
    <h1>Editar Producto <span style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?=$pro->nombre?></span></h1>
<?php else:?>
    <h1>Crear nuevo Producto</h1>
<?php endif;?>

<?php 
    if (isset($editar)) {
        $ruta = base_url."producto/save/".$pro->id;
    }else{
        $ruta = base_url."producto/save";
    }
?>

<?php $categorias = Utils::showCategorias(); ?>
<form action="<?=$ruta?>" method="post" enctype="multipart/form-data">
    <?php if(isset($editar) && isset($pro)): ?>
    <input type="hidden" name="" value="<?=$pro->id?>">
    <?php endif;?>
    <select name="categoria" id="">
    <?php while($cat = $categorias->fetch_object()):?>
        <option value="<?=$cat->id?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '' ?>> <?=$cat->nombre?> </option>
    <?php endwhile;?>
    </select>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '' ?>" required>
    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" value="<?=isset($pro) && is_object($pro) ? $pro->descripcion : '' ?>" required>
    <label for="precio">Precio</label>
    <input type="number" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '' ?>" required>
    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : '' ?>" required>
    <label for="oferta">Oferta</label>
    <input type="text" name="oferta" value="<?=isset($pro) && is_object($pro) ? $pro->oferta : '' ?>" required>
    <label for="imagen">Imagen</label>
    <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)):?>
        <img src="<?=base_url?>uploads/imagenes/<?=$pro->imagen?>" class="thumb" alt="">
    <?php endif; ?>   
    <input type="file" value="" name="imagen">
    <?php if (isset($editar) && isset($pro) && is_object($pro)):?>
    <input type="submit" value="Editar">
    <?php else:?>
    <input type="submit" value="Guardar">
    <?php endif;?>
</form>