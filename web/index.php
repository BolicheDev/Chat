<?php
session_start();
//Incluimos librerías
/* -------- */
require '../app/config.php';
/* -------- */
require '../app/funciones/funciones_mensajes.php';
/* -------- */
require '../app/controlador/ControladorUsuarios.php';
require '../app/controlador/ControladorMensajes.php';
/* -------- */
require '../app/modelo/Usuario.php';
require '../app/modelo/Mensajes.php';
require '../app/modelo/Sesion.php';

//Enrutamiento
$map = array(
    'login' => array('Controlador' => 'ControladorUsuarios', 'metodo' => 'login', 'publica' => true),
    'principal' => array('Controlador' => 'ControladorUsuarios', 'metodo' => 'principal', 'publica' => false),
    'cerrar' => array('Controlador' => 'ControladorUsuarios', 'metodo' => 'cerrar', 'publica' => false),
    'confirmar' => array('Controlador' => 'ControladorUsuarios', 'metodo' => 'confirmar', 'publica' => true),
    /* -------- */
    'listar_contactos' => array('Controlador' => 'ControladorContactos', 'metodo' => 'listar', 'publica' => false),
    'enviar' => array('Controlador' => 'ControladorMensajes', 'metodo' => 'enviar', 'publica' => false),
    'borrar_contacto' => array('Controlador' => 'ControladorContactos', 'metodo' => 'borrar_contacto', 'publica' => false),
    'editar_contacto' => array('Controlador' => 'ControladorContactos', 'metodo' => 'editar_contacto', 'publica' => false),
);

//Si no se introduce ningún comando por GET ponemos uno por defecto
if (!isset($_GET['comando']) || empty($_GET['comando'])) {
    $comando = 'login'; //Comando por defecto
} else {
    if (isset($map[$_GET['comando']])) { //Comprobamos que el comando exista en el mapa
        $comando = $_GET['comando'];
    } else { //Si el comando no existe en el mapa ponemos error 404
        header('Status: 404 Not Found');
        print("La página $_GET[comando] no existe");
        die();
    }
}

//Si la página es privada y no ha iniciado login no le dejamos acceder

if (!Sesion::existe() && $map[$comando]['publica'] == false) {
    header("Location:" . RUTA . "login");
    die();
}

//Ejecutar el controlador
$clase = $map[$comando]['Controlador'];
$metodo = $map[$comando]['metodo'];

$objeto = new $clase();
$objeto->$metodo();