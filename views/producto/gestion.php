<h1>Gestion de productos</h1>
<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear Producto
</a>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == "Complete"):?>
    <strong id="content" class="alert alert_green">Producto creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != "complete"):?>
    <strong class=" alert alert_red">El Producto No se ha creado correctamente</strong>
<?php endif;?>
<?php Utils::deleteSesion('producto'); ?>
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == "delete_complete"):?>
    <strong id="content" class="alert alert_green">Producto borrado</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != "delete_complete"):?>
    <strong class=" alert alert_red">El Producto No fue borrado</strong>
<?php endif;?>
<?php Utils::deleteSesion('delete'); ?>

<table border="1">
    <!-- <th>Categoria</th> -->
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>Stock</th>
    <!-- <th>Oferta</th> -->
    <!-- <th>Fecha</th>
    <th>Imagen</th> -->
    <th>Opciones</th>
<?php while($pro = $productos->fetch_object()):?>
    <tr>
        <!-- <td><//?=$pro->categoria_id;?></td> -->
        <td><?=$pro->nombre;?></td>
        <td><?=$pro->descripcion;?></td>
        <td><?=$pro->precio;?></td>
        <td><?=$pro->stock;?></td>
        <!-- <td><//?=$pro->oferta;?></td> -->
        <!-- <td><//?=$pro->fecha;?></td>
        <td><//?=$pro->imagen;?></td> -->
        <td>
            <a class="button button-gestion" style="text-decoration: none;" href="<?=base_url?>producto/editar">Editar</a>
            <a class="button button-red" style="text-decoration: none;" href="<?=base_url?>producto/eliminar/<?=$pro->id?>">Eliminar</a>
        </td>
    </tr>
    
<?php endwhile;?>
</table>
