<?php 
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class TipoUsuario extends Validator
{
    // Declaración de atributos (propiedades).
    private $idtipousuario = null;
    private $tipo = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idtipousuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipo($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
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
        return $this->idtipousuario;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */


    public function readAllTipos()
    {
        $sql = 'SELECT idtipousuario, tipo FROM tipoUsuario 
                ORDER BY idtipousuario';
        $params = null;
        return Database::getRows($sql, $params);
    }
    
    public function fun(){
        $sql = '';
        $params = array(  );
        return Database::getRow( $sql, $params );
    }

    public function createTipoUsuario(){
        $sql = 'INSERT INTO tipoUsuario( tipo ) 
                VALUES ( ? )';
        $params = array( $this->tipo );
        return Database::executeRow( $sql, $params );
    }

    public function readTipo(){
        $sql = 'SELECT idtipousuario, tipo 
                FROM tipoUsuario 
                WHERE idtipousuario = ?';
        $params = array( $this->idtipousuario );
        return Database::getRow( $sql, $params );
    }

    public function updateTipo(){
        $sql = 'UPDATE tipoUsuario 
                SET tipo = ? 
                WHERE idtipousuario = ?';
        $params = array( $this->tipo, $this->idtipousuario );
        return Database::executeRow( $sql, $params );
    }

    public function deleteTipo(){
        $sql = 'DELETE FROM tipoUsuario 
                WHERE idtipousuario = ?';
        $params = array( $this->idtipousuario );
        return Database::executeRow( $sql, $params );
    }
}
?>