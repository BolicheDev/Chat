<?php
class ControladorMensajes
{
    public function enviar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$texto = stripslashes(htmlspecialchars($_POST['texto']))) {
                $texto = "fallo";
            }
            $mensaje = new Mensajes(Sesion::get_usuario()->getId_usuario(), $texto);
            if ($mensaje->enviar()) {
                print json_encode(array("envia" => true));
            } else {
                print json_encode(array("envia" => false));
            }
        }
    }

    public function recibir()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_SESSION['Ultimo_ID'])) {
                $_SESSION['Ultimo_ID'] = 1;
            }
            $mensajes = Mensajes::obtener_mensajes();
            print json_encode($mensajes);
        }
    }
}
