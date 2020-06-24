<?php
/*
*	Clase para manejar la tabla talla de la base de datos. Es clase hija de Validator.
*/
class Talla extends Validator
{
    // Declaración de atributos (propiedades).
    private $idTalla = null;
    private $talla = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdTalla($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idTalla = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTalla($value)
    {
        if ($this->validateString($value, 1, 5)) {
            $this->talla = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdTalla()
    {
        return $this->idTalla;
    }

    public function getTalla()
    {
        return $this->talla;
    }

    public function createTalla()
    { 
        $sql = 'INSERT INTO talla(idTalla, talla)
                VALUES(DEFAULT, ?)';
        $params = array($this->talla);
        return Database::executeRow($sql, $params);
    }

    public function readAllTalla()
    {
        $sql = 'SELECT idTalla, talla
                FROM talla
                ORDER BY idTalla';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneTalla()
    {
        $sql = 'SELECT idTalla, talla
                FROM talla
                WHERE idTalla = ?';
        $params = array($this->idTalla);
        return Database::getRow($sql, $params);
    }

    public function updateTalla(){
            $sql='UPDATE talla SET talla=? WHERE idTalla=?';
            $params=array($this->talla, $this->idTalla);
            return Database::executeRow($sql, $params);
        }

    public function deleteTalla()
    {
        $sql = 'DELETE FROM talla
                WHERE idTalla = ?';
        $params = array($this->idTalla);
        return Database::executeRow($sql, $params);
    }
}
?>