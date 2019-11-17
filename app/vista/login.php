<?php ob_start();?>
<div class="login">
    <form action="<?=RUTA?>login" method="POST">
        <p>
            Nick <input type="text" name="nick">
        </p>
        <button type="submit" class="botones">Enviar</button>
    </form>
</div>
<?php
$HTML_vista = ob_get_clean(); //Devuelve el contenido del buffer
require '../app/vista/default.php';
?>