<?php ob_start();?>
<form action="<?=RUTA?>login" method="POST">
    <p>
        Nick <input type="text" name="nick">
    </p>
    <button type="submit">Enviar</button>
</form>
<?php
$HTML_vista = ob_get_clean(); //Devuelve el contenido del buffer
require '../app/vista/default.php';
?>