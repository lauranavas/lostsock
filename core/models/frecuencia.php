<?php
/*
*	Clase para manejar la tabla frecuencia de la base de datos. Es clase hija de Validator.
*/
class Frecuencia extends Validator
{
    // Declaración de atributos (propiedades).
    private $idFrecuencia = null;
    private $frecuencia = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdFrecuencia($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idFrecuencia = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFrecuencia($value)
    {
        if ($this->validateString($value, 1, 25)) {
            $this->frecuencia = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdFrecuencia()
    {
        return $this->idFrecuencia;
    }

    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function createFrecuencia()
    {
        $sql = 'INSERT INTO frecuencia(frecuencia)
                VALUES(?)';
        $params = array( $this->frecuencia );
        return Database::executeRow( $sql, $params );
    }
 
    public function readAllFrecuencia()
    {
        $sql = 'SELECT idfrecuencia, frecuencia
                FROM frecuencia
                ORDER BY idFrecuencia';
        $params = null;
        return Database::getRows( $sql, $params );
    }

    public function readFrecuencia()
    {
        $sql = 'SELECT idfrecuencia, frecuencia
                FROM frecuencia
                WHERE idFrecuencia = ?';
        $params = array( $this->idFrecuencia );
        return Database::getRow( $sql, $params );
    }

    public function updateFrecuencia(){
        $sql = 'UPDATE frecuencia 
                SET frecuencia = ? 
                WHERE idFrecuencia = ?';
        $params=array( $this->frecuencia, $this->idFrecuencia );
        return Database::executeRow( $sql, $params );
    }

    public function deleteFrecuencia()
    {
        $sql = 'DELETE FROM frecuencia
                WHERE idFrecuencia = ?';
        $params = array( $this->idFrecuencia );
        return Database::executeRow( $sql, $params );
    }
}
?>