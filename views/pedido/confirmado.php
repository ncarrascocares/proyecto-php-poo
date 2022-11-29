<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>

    <h1>Tu pedido ha sido confirmado</h1>

    <p>Tu pedido ha sido guardado con exito, una vez validada la transferencia con el monto del pedido, se realizara el envio de sus productos a la dirección ingresada. Gracias por tu compra!!</p>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>

    <p>Tu pedido no ha sido procesado</p>

<?php endif; ?>