<?php
/*
*	Clase para manejar la tabla administrador de la base de datos. Es clase hija de la clase Validator.
*/
class Administrador extends Validator{
    // 
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $email = null;
    private $usuario = null;
    private $clave = null;
    private $estado = null;
    private $tipo = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
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

    public function setTipo($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->tipo = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
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

    public function getTipo()
    {
        return $this->tipo;
    }


    /*
    *   Métodos para gestionar la cuenta del usuario.
    */

    /*
    *   Método para validar una cadena de texto (letras, digitos, espacios en blanco y signos de puntuación).
    *
    *   Parámetros: $value (dato a validar), $minimum (longitud mínima) y $maximum (longitud máxima).
    *   
    *   Retorno: booleano (true si el valor es correcto o false en caso contrario).
    */
    public function checkEstado( $email ){
        $sql = 'SELECT estado FROM administrador WHERE email = ?';
        $params = array($email);
        $data = Database::getRow($sql, $params);
        if ( $data['estado'] == 1 ) {
            return true;
        } else {
            return false;
        }
    }
    public function checkEmail( $email ){
        $sql = 'SELECT idAdministrador, nombres, apellidos FROM administrador WHERE email = ?';
        $params = array($email);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['idadministrador'];
            $this->email = $email;
            $this->nombres = $data['nombres'];
            $this->apellidos = $data['apellidos'];
            return true;
        } else {
            return false;
        }
    }

    public function checkClave( $clave )
    {
        $sql = 'SELECT clave FROM administrador WHERE idAdministrador = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify( $clave, $data[ 'clave' ] )) {
            return true;
        } else {
            return false;
        }
    }

    public function editProfile()
    {
        $sql = 'UPDATE administrador 
                SET nombres = ?, apellidos = ?, email = ?, usuario = ?
                WHERE idadministrador = ?';
        $params = array($this->nombres, $this->apellidos, $this->email, $this->usuario, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE administrador 
                SET clave = ? WHERE idadministrador = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function readAllAdministradores(){
        if ( isset( $_SESSION['idadministrador'] ) ) {
            $this->setId( $_SESSION['idadministrador'] );
            $sql = 'SELECT idadministrador, nombres, apellidos, email, usuario, estado, tipo 
                FROM administrador INNER JOIN tipoUsuario USING(idTipoUsuario) 
                WHERE idadministrador <> ? ORDER BY nombres';
            $params = array( $this->id );
        } else {
            $sql = 'SELECT idadministrador, nombres, apellidos, email, usuario, estado, tipo 
                FROM administrador INNER JOIN tipoUsuario USING(idTipoUsuario) 
                ORDER BY nombres';
            $params = null;
        }  
        return Database::getRows($sql, $params);
    }

    public function checkExist($value){
        switch ($value) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }

    public function createAdministrador()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO administrador( nombres, apellidos, email, usuario, clave, estado, idTipoUsuario)
        VALUES ( ?, ?, ?, ?, ?, DEFAULT, ? )';
        $params = array( $this->nombres, $this->apellidos, $this->email, $this->usuario, $hash, $this->tipo );
        return Database::executeRow($sql, $params);
    }

    public function readOneAdministrador()
    {
        $sql = 'SELECT idadministrador, nombres, apellidos, email, usuario, estado, idtipousuario 
            FROM administrador
            WHERE idadministrador = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateAdministrador()
    {
        $sql = 'UPDATE administrador 
                SET nombres = ?, apellidos = ?, email = ?, usuario = ?, estado = ?, idtipousuario = ?
                WHERE idadministrador = ?';
        $params = array($this->nombres, $this->apellidos, $this->email, $this->usuario, $this->estado, $this->tipo, $this->id);
        return Database::executeRow($sql, $params);
    }
    
    public function deleteAdministrador()
    {
        $sql = 'DELETE FROM administrador
                WHERE idadministrador = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>