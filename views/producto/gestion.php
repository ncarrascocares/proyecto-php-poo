<h1>Gestion de productos</h1>
<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear Producto
</a>
<table border="1">
    <th>Categoria</th>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Oferta</th>
    <th>Fecha</th>
    <th>Imagen</th>
<?php while($pro = $productos->fetch_object()):?>
    <tr>
        <td><?=$pro->categoria_id;?></td>
        <td><?=$pro->nombre;?></td>
        <td><?=$pro->descripcion;?></td>
        <td><?=$pro->precio;?></td>
        <td><?=$pro->stock;?></td>
        <td><?=$pro->oferta;?></td>
        <td><?=$pro->fecha;?></td>
        <td><?=$pro->imagen;?></td>
    
    </tr>
<?php endwhile;?>
</table>