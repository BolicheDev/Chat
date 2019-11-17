<?php
/**
 * Añade un mensaje_flash
 * @param type $mensaje
 */
function guardar_mensaje($mensaje)
{
    $_SESSION['mensajes_flash'][] = $mensaje;
}

/**
 * Imprime todos los mensajes flash en divs con class="mensaje_flash" y después los borra
 */
function imprimir_mensajes()
{
    if (isset($_SESSION['mensajes_flash'])) {
        foreach ($_SESSION['mensajes_flash'] as $m) {
            print "<div class=\"mensaje_flash\">$m</div>";
        }
        unset($_SESSION['mensajes_flash']);
    }
}
