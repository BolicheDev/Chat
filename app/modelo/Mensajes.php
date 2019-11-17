<?php
class Mensajes
{
    private $id_mensaje;
    private $id_usuario;
    private $texto;

    public function __construct($id_usuario, $texto)
    {
        $this->id_usuario = $id_usuario;
        $this->texto = $texto;
    }

    /**
     * Get the value of id_mensaje
     */
    public function getId_mensaje()
    {
        return $this->id_mensaje;
    }

    /**
     * Set the value of id_mensaje
     *
     * @return  self
     */
    public function setId_mensaje($id_mensaje)
    {
        $this->id_mensaje = $id_mensaje;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of texto
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    public function enviar()
    {
        $conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
        if ($conn->connect_errno) {
            print "Error en conectar a la base de datos " . $conn->connect_errno;
            die();
        }
        if (!$stmt = $conn->prepare("insert into mensajes (id_usuario, texto) values({$this->getId_usuario()}, '{$this->getTexto()}')")) {
            print "Error al preparar la consulta {$conn->error}";
        }
        if (!$stmt->execute()) {
            print "Error al ejecutar la consulta {$stmt->error}";
        }

        if ($stmt) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

}
