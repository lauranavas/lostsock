<?php
/*
*	Clase para manejar la tabla cliente de la base de datos. Es clase hija de la clase Validator.
*/
class Cliente extends Validator{
    // 
    private $idCliente = null; 
    private $nombres = null;
    private $apellidos = null; 
    private $email = null;
    private $telefono = null; 
    private $usuario = null;
    private $estado = null;
    private $clave = null;
    private $imagen = null;
    private $archivo = null;
    private $ruta = '../../../resources/img/clientes/';

    /*
    *   Métodos para asignar valores a los atributos.
    */

    public function setIdCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idCliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value)
    {
        if ($this->validateString($value, 1, 25)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateString($value, 1, 25)) {
            $this->apellidos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmail($value)
    {
        if ($this->validateEmail($value)) {
            $this->email = $value;
            return true;
        } else {
            return false;
        }
    }


    public function setTelefono($value)
    {
        if ($this->validatePhoneNumber($value)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }


    public function setUsuario($value)
    {
        if ($this->validateUsername($value)) {
            $this->usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            $this->archivo = $file;
            return true;
        } else {
            return false;
        }
    }
    
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    /*
    *   Métodos para gestionar la cuenta del cliente.
    */

    public function checkExist($column, $value){
        switch ($column) {
            case 'email':
                $sql = 'SELECT * FROM cliente WHERE email = ?';
                break;
            case 'telefono':
                $sql = 'SELECT * FROM cliente WHERE telefono = ?';
                break;
            case 'usuario':
                $sql = 'SELECT * FROM cliente WHERE usuario = ?';
                break;
            default:
                # code...
                break;
        }
        $params = array($value);
        if ($data = Database::getRow($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEstado( $email ){
        $sql = 'SELECT estado FROM cliente WHERE email = ?';
        $params = array($email);
        $data = Database::getRow($sql, $params);
        if ( $data['estado'] == 1 ) {
            return true;
        } else {
            return false;
        }
    }
    public function checkEmail( $email ){
        $sql = 'SELECT idCliente, nombres, apellidos, telefono, usuario, imagen FROM cliente WHERE email = ?';
        $params = array($email);
        if ($data = Database::getRow($sql, $params)) {
            $this->idCliente = $data['idcliente'];
            $this->email = $email;
            $this->nombres = $data['nombres'];
            $this->apellidos = $data['apellidos'];
            $this->telefono = $data['telefono'];
            $this->usuario = $data['usuario'];
            $this->imagen = $data['imagen'];
            return true;
        } else {
            return false;
        }
    }

    public function checkClave( $clave )
    {
        $sql = 'SELECT clave FROM cliente WHERE idcliente = ?';
        $params = array($this->idCliente);
        $data = Database::getRow($sql, $params);
        if (password_verify( $clave, $data[ 'clave' ] )) {
            return true;
        } else {
            return false;
        }
    }

    public function createCliente()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO cliente( nombres, apellidos, email, telefono, usuario, clave)
        VALUES ( ?, ?, ?, ?, ?, ? )';
        $params = array( $this->nombres, $this->apellidos, $this->email, $this->telefono, $this->usuario, $hash );
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    /*Función para realizar un select de todos los clientes*/
    public function readAllCliente()
    {
        $sql = 'SELECT idcliente, nombres, apellidos, email, telefono, usuario, estado FROM cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneCliente()
    {
        $sql = 'SELECT idcliente, nombres, apellidos, email, telefono, usuario FROM cliente WHERE idcliente = ?';
        $params = array($this->idCliente);
        return Database::getRow($sql, $params);
    }
    public function readSuscripcionesCliente()
    {
        $sql = 'SELECT s.idsuscripcion, tl.talla, f.frecuencia, ct.categoria, tp.tipo, ps.precio, 
                dp.costoenvio
                FROM suscripcion s 
                JOIN talla tl USING(idtalla)
                JOIN categoria ct USING(idcategoria)
                JOIN plansuscripcion ps USING(idplansuscripcion)
                JOIN tipoproducto tp USING(idtipoproducto)
                JOIN frecuencia f USING(idfrecuencia)
                JOIN direccion dr USING(iddireccion)
                JOIN departamento dp USING(iddepartamento) WHERE s.idcliente = ?';
        $params = array($this->idCliente);
        return Database::getRows($sql, $params);
    }

    public function disableCliente()
    {
        $sql = 'UPDATE cliente 
                SET estado = ?
                WHERE idcliente = ?';
        $params = array($this->estado, $this->idCliente);
        return Database::executeRow($sql, $params);
    }
    
}
?>