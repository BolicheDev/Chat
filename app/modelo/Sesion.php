<?php
class Sesion
{
    public static function existe()
    {
        return isset($_SESSION['Usuario_Clase_Sesion']);
    }

    public static function crear($usuario)
    {
        $_SESSION['Usuario_Clase_Sesion'] = serialize($usuario);
    }

    public static function get_usuario(): Usuario
    {
        if (Sesion::existe()) {
            return unserialize($_SESSION['Usuario_Clase_Sesion']);
        } else {
            return null;
        }
    }

    public static function eliminar()
    {
        unset($_SESSION['Usuario_Clase_Sesion']);
    }
}
