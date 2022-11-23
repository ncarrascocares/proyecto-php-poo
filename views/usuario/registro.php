<?php if(isset($_SESSION['register']) &&  $_SESSION['register'] == "complete"): ?>
     <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) &&  $_SESSION['register'] == "failed"):?>
    <strong class="alert_red">Registro fallido. Introduce bien los datos</strong>
<?php endif; ?>
<?php if(isset($_SESSION['register']) &&  $_SESSION['register'] == "failed"){
        $color = 'red;';
    }else{
        $color = 'black;';
    } ?>

<h1>Registro de usuarios</h1>

<form action="<?=base_url?>usuario/save" method="post">
  
    <label style="color:<?=$color?>" for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">

    <label style="color:<?=$color?>" for="apellido">Apellidos</label>
    <input type="text" name="apellido" id="apellido">
    
    <label style="color:<?=$color?>" for="email">Email</label>
    <input type="email" name="email" id="email">

    <label style="color:<?=$color?>" for="password">Contraseña</label>
    <input type="password" name="password" id="password">

    <input type="submit" value="Registrar">
    
</form>

<?php Utils::deleteSesion('register') ?>