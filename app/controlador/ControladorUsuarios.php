<?php
class ControladorUsuarios
{
    public function principal()
    {
        require '../app/vista/chat.php';
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = stripslashes(htmlspecialchars($_POST['nick']));
            if (!empty($nombre)) {
                $usuario = new Usuario();
                if ($usuario->obtener_por_nick($nombre)) {
                    Sesion::crear($usuario);
                    header('Location:' . RUTA . "principal");
                    die();
                } else {
                    guardar_mensaje("No existe ese usuario");
                    // header("Location: " . RUTA . "login");
                    // die();
                }
            } else {
                guardar_mensaje("Usuario en blanco");
                // header("Location: " . RUTA . "login");
                // die();
            }
        }
        require '../app/vista/login.php';
    }
}
