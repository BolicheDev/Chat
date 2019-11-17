<?php ob_start();?>
    <div class="chat-cuerpo" id="chat-cuerpo">
    </div>
    <div class="chat-input">
        <div contenteditable="true" class="div-escribir" id="div-mensaje"></div>
        <div class="div-enviar no-seleccionable" id="div-enviar">
            <b>Enviar</b>
        </div>
    </div>
<?php
$HTML_vista = ob_get_clean(); //Devuelve el contenido del buffer
require '../app/vista/default.php';
?>