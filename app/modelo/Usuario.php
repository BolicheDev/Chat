<?php
class Usuario
{
    private $id_usuario;
    private $nick;
    private $password;

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
     * Get the value of nick
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set the value of nick
     *
     * @return  self
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function obtener_por_nick($nick)
    {
        $conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
        if ($conn->connect_errno) {
            print "Error en conectar a la base de datos " . $conn->connect_errno;
            die();
        }
        if (!$stmt = $conn->prepare('Select * from usuarios where nick=?')) {
            print "Error al preparar la consulta {$conn->error}";
        }
        if (!$stmt->bind_param('s', $nick)) {
            print "Error en el bind_para {$stmt->error}";
        }
        if (!$stmt->execute()) {
            print "Error al ejecutar la consulta {$stmt->error}";
        }
        $result = $stmt->get_result();

        if (!$fila = $result->fetch_assoc()) {
            $conn->close();
            return false;
        } else {
            $this->setId_usuario($fila['id_usuario']);
            $this->setNick($fila['nick']);
            $this->setPassword($fila['password']);
            $conn->close();
            return true;
        }

    }
}
